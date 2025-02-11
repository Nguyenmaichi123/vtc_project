<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
use Queueable, SerializesModels;

public $contact; // Khai báo thuộc tính public

/**
* Create a new message instance.
*/
public function __construct($contact)
{
$this->contact = $contact;
}

/**
* Get the message envelope.
*/
public function envelope()
{
return new Envelope(
subject: 'Thông tin liên hệ mới',
);
}

/**
* Get the message content definition.
*/
public function content()
{
return new Content(
view: 'emails.contact', // Đặt đúng tên view email
with: ['contact' => $this->contact],
);
}

/**
* Get the attachments for the message.
*/
public function attachments()
{
return [];
}
}