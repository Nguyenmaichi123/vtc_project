<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject('Xác nhận đã nhận được liên hệ')
                    ->view('emails.contact_mail')
                    ->with([
                        'name' => $this->contact['name'],
                        'email' => $this->contact['email'],
                        'phone' => $this->contact['phone'],
                        'message' => $this->contact['message'],
                    ]);
    }
}

?>