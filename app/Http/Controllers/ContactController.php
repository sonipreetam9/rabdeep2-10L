<?php

namespace App\Http\Controllers;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function Contact()
    {
        return view('contact');
    }

    public function ContactSubmit(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:150',
                'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
                'message' => 'required|string|max:2000',
            ],
            [
                'name.required' => 'Please enter your name.',
                'email.required' => 'Please enter your email address.',
                'email.email' => 'Please enter a valid email address.',
                'phone.required' => 'Please enter your phone number.',
                'phone.regex' => 'Please enter a valid phone number.',
                'message.required' => 'Please enter your message.',
            ]
        ); 
        
        ContactModel::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
