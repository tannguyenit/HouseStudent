<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PublicNewPost extends Mailable
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
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New post public to website')->view('emails.public_post')
            ->with([
                'id'       => $this->id,
                'email'    => $this->email,
                'fullname' => $this->fullname,
                'username' => $this->username,
                'phone'    => $this->phone,
            ]);
    }
}
