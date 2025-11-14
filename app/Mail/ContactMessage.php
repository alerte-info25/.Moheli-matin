<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Crée une nouvelle instance du message.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Définit les infos de l’enveloppe (sujet, expéditeur, etc.)
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau message de contact - Moheli Matin',
            replyTo: $this->data['email'] ?? null,
        );
    }

    /**
     * Contenu du mail (vue + data)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            with: [
                'prenom' => $this->data['prenom'],
                'nom' => $this->data['nom'],
                'email' => $this->data['email'],
                'telephone' => $this->data['telephone'],
                'sujet' => $this->data['sujet'],
                'messageText' => $this->data['message'],
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
