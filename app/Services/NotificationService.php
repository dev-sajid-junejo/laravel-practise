<?php

namespace App\Services;

use Twilio\Rest\Client;

class NotificationService
{
    protected $twilio;

    public function __construct()
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.auth_token');
        $this->twilio = new Client($sid, $token);
    }

    public function sendSmsNotification($phone, $products)
    {
        dd($products->category->slug, $products->slug, $products->qty, $phone);
        $messagingServiceSid = config('services.twilio.messaging_service_sid');

        if ($user) {
            try {
                $message = $this->twilio->messages->create(
                    $phone,
                    [
                        'messagingServiceSid' => $messagingServiceSid,
                        'body' => "Exciting News! 🎉 A new product has just been added to our shop: {$product->name}. Check it out now and grab it before it's gone! Visit: http://127.0.0.1:8000/category/{$products->category->slug}/{$products->slug}"
                    ]
                );

                return [
                    'success' => true,
                    'sid' => $message->sid,
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }
        }

        return [
            'success' => false,
            'error' => 'No user found or phone number is missing.',
        ];
    }
}
