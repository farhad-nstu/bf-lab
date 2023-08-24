<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    private $data;

    public function __construct(User $obj)
    {
        $this->data = $obj;
    }
    
    public function build()
    {
        return $this->view('admin.emails.register')->with('data', $this->data);
    }
}
