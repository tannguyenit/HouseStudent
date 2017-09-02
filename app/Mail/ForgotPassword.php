<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $email;
    public $active;
    public $full_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->id        = $data['id'];
        $this->email     = $data['email'];
        $this->active    = $data['active'];
        $this->full_name = $data['full_name'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset password')->view('emails.forgot-password')
            ->with([
                'id'        => $this->id,
                'email'     => $this->email,
                'active'    => $this->active,
                'full_name' => $this->full_name,
            ]);
    }
}
