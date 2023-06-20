<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pass;
    public $status;

    public function __construct($pass, $status)
    {
        $this->pass = $pass;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->status == 'new') {
            return $this->subject('Успешная регистрация')->markdown('mail.password');
        }else{
            return $this->subject('Восстановление пароля')->markdown('mail.password');
        }
    }
}
