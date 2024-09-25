<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
{
    use Queueable;
public $order;
    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('new order'.$this->order->number)
            ->greeting('hi'.$notifiable->name)
                    ->line('new order'.$this->order->number.'created by'.$this->order->pillingaddresses->first_name)
                    ->action('Notification Action', url('/home'))
                    ->line('Thank you for using our application!');

    }
public function toDatabase(object $notifiable){
        return[

'body'=>'new order'.$this->order->number,
            'icon'=>'bi bi-envelope me-2',
            'url'=>url('dashboard'),


        ];

}
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
