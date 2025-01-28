<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use App\Models\Product;

class ProductAddedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $product;

    /**
     * Create a new notification instance.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast']; // Use multiple channels as needed
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Product Added')
            ->line('A new product has been added: ' . $this->product->name)
            ->action('View Product', url('/products/' . $this->product->id))
            ->line('Thank you for staying updated!');
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
            'product_id' => $this->product->id,
            'name' => $this->product->name,
            'description' => $this->product->small_description,
            'price' => $this->product->selling_price,
        ];
    }

    /**
     * Get the broadcast representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'product_id' => $this->product->id,
            'name' => $this->product->name,
            'description' => $this->product->small_description,
            'price' => $this->product->selling_price,
        ]);
    }
}
