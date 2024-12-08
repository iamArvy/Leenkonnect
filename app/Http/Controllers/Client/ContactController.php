<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\AcknowledgmentMail;
use App\Mail\ContactFormMail;
class ContactController extends Controller
{
    public function index()
    {
        return inertia('Client/Contact');
    }

    public function store(ContactRequest $request)
    {
        $validated = $request->validated();
        Mail::send(new ContactFormMail($validated));
        Mail::send(new AcknowledgmentMail($validated));
        // ContactMessage::create($validated);
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}
