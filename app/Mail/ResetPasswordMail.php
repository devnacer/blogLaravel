<?php

namespace App\Mail;

use App\Models\Profil;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private readonly Profil $profil)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'blog | Procédure de Réinitialisation de Mot de Passe',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $id = $this->profil->id;
        $created_at = $this->profil->created_at;
        $href = url()->to('/reset_password/' . base64_encode($created_at . '///' . $id));
        return new Content(
            view: 'mail.registration',
            with: [
                'name' => $this->profil->name,
                'email' => $this->profil->email,
                'href' => $href,
            ]
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
