<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'username'       => 'required|string|max:255',
            'email'          => 'required|email',
            'phone'          => 'required|string|max:50',
            'inquiry_type'   => 'required|string',
            'message'        => 'required|string',
        ]);

        // Sanitasi input secara ketat untuk mencegah XSS & memastikan keamanan ke DB (bila disimpan)
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            $sanitizedData[$key] = is_string($value) ? htmlspecialchars(strip_tags($value), ENT_QUOTES, 'UTF-8') : $value;
        }

        Mail::to('marketing@bajakonstruksi.co.id')
            ->send(new ContactMail($sanitizedData));

        return back()->with('success', 'Message sent successfully!');
    }
}
