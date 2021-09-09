<?php

namespace App\Notifications;

use App\models\vindoers\vindoers_model;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class vindowers extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $vindoer ;
    public function __construct(vindoers_model $vindoer)
    {
        $this -> vindoer = $vindoer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $name = $this -> vindoer -> name;
        return (new MailMessage)
                    ->subject("لقد تم انشاء حسابكم في موقع الذكي")
                    ->line("اهلا بك يا $name في موقعنا المتواضع يجب عليك ان تقوم بالضغط علي الزرار لتفعيل الحساب")
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
