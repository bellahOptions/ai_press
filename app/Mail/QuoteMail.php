<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $clientName,
        public string $clientEmail,
        public string $clientPhone,
        public string $company,
        public string $serviceType,
        public string $projectDetails,
        public string $quantity,
        public string $timeline,
        public string $budget,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [$this->clientEmail],
            subject: 'New Quote Request — ' . $this->serviceType . ' from ' . $this->clientName,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quote',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
