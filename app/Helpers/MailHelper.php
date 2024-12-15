<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Mail;


class MailHelper
{
    // Define the sendMail method inside a class
    public function sendMail($template, $to, $subject, $data)
    {
        Mail::send($template, $data, function($message) use ($to, $subject) {
            $message->subject($subject);
            $message->to($to);
        });
    }
}