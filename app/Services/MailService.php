<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class MailService
{
    /**
     * Send an email.
     *
     * @param string $to
     * @param string $subject
     * @param string $view
     * @param array $data
     * @return void
     */
    public function sendMail($to, $subject, $view, $data = [])
    {
        try {
            Mail::send($view, $data, function ($message) use ($to, $subject) {
                $message->to($to)
                ->subject($subject);
            });
            
            Log::info("Email sent successfully to {$to}");
        } catch (\Exception $e) {
            dd($e);
            Log::error("Failed to send email to {$to}: " . $e->getMessage());
        }
    }
}