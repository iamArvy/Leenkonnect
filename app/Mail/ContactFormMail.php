<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    /**
     * Define email metadata.
     */
    public function envelope(): Envelope
    {
        // dd($this->contactData['email']);

        return new Envelope(
            subject: $this->contactData['subject'],
            from: env('MAIL_FROM_ADDRESS'), // App email from .env
            to: [env('MAIL_FROM_ADDRESS')], // Admin email from .env
            replyTo: $this->contactData['email']
        );
    }

    /**
     * Define email content.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
            with: ['data' => $this->contactData]
        );
    }

    /**
     * Define any attachments if necessary.
     */
    public function attachments(): array
    {
        return [];
    }
}
