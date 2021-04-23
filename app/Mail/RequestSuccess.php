<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestSuccess extends Mailable
{
    use Queueable, SerializesModels;

    protected $user_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('[Completed] Real Estate Transfer Request')
            ->from(env('MAIL_FROM_ADDRESS', 'system@web.frangiadakis.com'), env('APP_NAME', 'system@web.frangiadakis.com'))
            ->view('mails.requestSuccess')
            ->with([
                'name' => $this->user_name
            ]);
    }
}
