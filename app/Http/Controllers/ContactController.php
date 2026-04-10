<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Helpers\ApiResponse;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'username'       => 'required|string|max:255',
            'email'          => 'required|email',
            'phone'          => 'required|string|max:50',
            'inquiry_type'   => 'required|string',
            'message'        => 'required|string',
        ]);

        if ($validator->fails()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        // Sanitasi input secara ketat untuk mencegah XSS & memastikan keamanan ke DB (bila disimpan)
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            $sanitizedData[$key] = is_string($value) ? htmlspecialchars(strip_tags($value), ENT_QUOTES, 'UTF-8') : $value;
        }

        try {
            Mail::to(config('mail.admin_email.contact', 'marketing@bajakonstruksi.co.id'))
                ->send(new ContactMail($sanitizedData));
        } catch (\Exception $e) {
            \Log::error('Contact Mail Failed: ' . $e->getMessage());
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Laporan terkirim ke sistem, namun gagal mengirim notifikasi email.'
                ], 200); // Kita anggap 200 karena data sudah di proses/log
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Pesan Anda telah berhasil dikirim!'
            ]);
        }

        return back()->with('success', 'Message sent successfully!');
    }
}
