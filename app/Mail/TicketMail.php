<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $userReplyTo;

    public string $message;

    public string $userName;

    public function __construct(string $userReplyTo, string $message, string $userName)
    {
        $this->userReplyTo = $userReplyTo;
        $this->message = $message;
        $this->userName = $userName;
    }

    public function build(): TicketMail
    {
        return $this->markdown('emails.ticket')
            ->replyTo($this->userReplyTo)
            ->subject('Tiket Masuk')
            ->with([
                'message' => $this->message,
                'userName' => $this->userName,
                'userReplyTo' => $this->userReplyTo,
            ]);
    }
}
