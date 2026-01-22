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


        Mail::to('marketing@bajakonstruksi.co.id')
            ->send(new ContactMail($data));

        return back()->with('success', 'Message sent successfully!');
    }
}
