<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewAdvert extends Notification
{
    use Queueable;
    private $advert;
    private $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($advert, $type)
    {
        $this->advert = $advert;
        $this->type= $type;
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
        //dd($this->advert);
        return (new MailMessage)
                    ->line('New '.$this->type.' has been posted')
                    ->action('View advert', route('view-advert', [$this->advert]))
                    ->line('Be the first to check it !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [];
    }
}
