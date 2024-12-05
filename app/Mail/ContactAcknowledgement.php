<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAcknowledgment extends Mailable
{
    use Queueable, SerializesModels;

    public $userData;

    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    /**
     * Define email metadata.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We’ve Received Your Message',
            from: [env('MAIL_FROM_ADDRESS') => config('app.name')],
        );
    }

    /**
     * Define email content.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-acknowledgment',
            with: ['user' => $this->userData]
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
