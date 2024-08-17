<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\ThankYouMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send the contact email
        Mail::to('dilukingmaker@gmail.com')->send(new ContactMail($request->all()));

        // Send the thank you email to the sender
        Mail::to($request->email)->send(new ThankYouMail($request->name));

        return response()->json(['message' => 'Message sent successfully!'],404);
    }
}
