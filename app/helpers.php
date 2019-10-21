<?php

use App\ProductImage;
use Illuminate\Support\Facades\Mail;


if (!function_exists('send_email')) {
    /**
     * Send email with template name and email data as inputs.
     *
     * @param $template
     * @param $email_data
     */
    function send_email($template, $email_data)
    {
        Mail::send($template, $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject($email_data['subject'])
                ->from('test@mail.com', 'LaravelServer');
        });
    }
}