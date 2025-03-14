<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $products;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $products)
    {
        $this->order = $order;
        $this->products = $products;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Xác nhận đơn hàng của bạn')
                    ->view('emails.order_confirmation')
                    ->with([
                        'order' => $this->order,
                        'products' => $this->products,
                    ]);
    }
}

