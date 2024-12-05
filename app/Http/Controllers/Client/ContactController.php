<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
class ContactController extends Controller
{
    public function index()
    {
        return view('client.contact.index');
    }

    public function store(ContactRequest $request)
    {
        $validated = $request->validated();
        Mail::send(new ContactFormMail($validated));
        Mail::to($validated['email'])->send(new ContactAcknowledgment($validated));
        // ContactMessage::create($validated);
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}
