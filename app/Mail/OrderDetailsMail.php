<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $order;
    public $delivery;
    public $items;
    public function __construct($orderData)
    {
        $this->order = $orderData['order'];
        $this->delivery = $orderData['delivery'];
        $this->items = $orderData['items'];

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Order has been placed successfully.',
            from: env('MAIL_FROM_ADDRESS'),
            to: $this->delivery->email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // dd($this->delivery);
        return new Content(
            view: 'emails.order-acknowledgment',
            with: ['order' => $this->order, 'delivery' => $this->delivery, 'items' => $this->items]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
