<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;

trait DownloadsImages
{
    /**
     * Download an image from a URL and store it in the public disk.
     *
     * @param  string  $url      Remote image URL
     * @param  string  $folder   Subfolder inside storage/app/public (e.g. 'seed/heroes')
     * @param  string  $filename Filename to save as (without extension)
     * @return string            Relative path stored in DB (e.g. 'seed/heroes/banner1.jpg')
     */
    protected function downloadImage(string $url, string $folder, string $filename): string
    {
        $extension = 'jpg';
        $relativePath = "{$folder}/{$filename}.{$extension}";

        // Skip if already downloaded
        if (Storage::disk('public')->exists($relativePath)) {
            return $relativePath;
        }

        try {
            $context = stream_context_create([
                'http' => [
                    'timeout'         => 30,
                    'follow_location' => true,
                    'user_agent'      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                ],
                'ssl' => [
                    'verify_peer'      => false,
                    'verify_peer_name' => false,
                ],
            ]);

            $contents = @file_get_contents($url, false, $context);

            if ($contents === false) {
                // Return a placeholder path if download fails
                echo "  [WARN] Could not download: {$url}\n";
                return $relativePath;
            }

            Storage::disk('public')->put($relativePath, $contents);
            echo "  [OK] Downloaded: {$relativePath}\n";
        } catch (\Exception $e) {
            echo "  [ERR] {$e->getMessage()}\n";
        }

        return $relativePath;
    }
}
