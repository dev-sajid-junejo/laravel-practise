<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioMessage;

class TwilioNotification extends Notification
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return [TwilioChannel::class]; // Define the Twilio channel
    }

    public function toTwilio($notifiable)
    {
        return TwilioMessage::create()
        ->content($this->message) // Set the content of the SMS message
            ->to($notifiable->phone); // Use the phone field
    }
}

