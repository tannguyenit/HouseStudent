<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $username;
    public $email;
    public $fullname;
    public $phone;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->id       = $data['id'];
        $this->username = $data['username'];
        $this->email    = $data['email'];
        $this->fullname = $data['fullname'];
        $this->phone    = $data['phone'];
        $this->token    = $data['token'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registe Account Success')->view('emails.register')
            ->with([
                'id'       => $this->id,
                'email'    => $this->email,
                'fullname' => $this->fullname,
                'username' => $this->username,
                'phone'    => $this->phone,
                'token'    => $this->token,
            ]);
    }
}
