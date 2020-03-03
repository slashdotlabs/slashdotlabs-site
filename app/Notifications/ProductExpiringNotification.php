<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;

class ProductExpiringNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /** @var Collection */
    public $expiring_items;


    /**
     * Create a new notification instance.
     *
     * @param Collection $expiring_items
     */
    public function __construct(Collection $expiring_items)
    {
        $this->expiring_items = $expiring_items;

        $this->queue = "emails";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        // TODO: handling renewals
        return (new MailMessage)->markdown('mail.product.expiring', [
            'customer' => $notifiable,
            'expiring_items' => $this->expiring_items,
            'renew_url' => url('/products/renew')
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
