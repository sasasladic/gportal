<?php

use App\Image;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\File\UploadedFile;


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

/**
 * Save user image if it's set.
 *
 * @param UploadedFile $image
 * @param string $alt
 *
 * @return object
 */
function saveImage(UploadedFile $image, string $alt): object
{
    $image->storeAs('public/image', $image->getClientOriginalName());
    $imageObject = new Image();
    $imageObject->path = '/storage/image/' . $image->getClientOriginalName();
    $imageObject->alt = $alt;

    return $imageObject->save() ? $imageObject : null;
}
