<?php

namespace App\Mail;

use App\Models\Orders;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @param Orders;
     * @return void
     */
    public function __construct(Orders $orders)
    {
        $this->orders =$orders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mailsupchat@gmail.com','Male Fashion')
            ->subject('Yeni Sipariş')
            ->view('mail.newOrder')->
            with(['totalCount'=>$this->orders->product_total_count,
                    'totalPrice'=>$this->orders->total_price,
                    'time'=>$this->orders->time
                ]);
    }
}
