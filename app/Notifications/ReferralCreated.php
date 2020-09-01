<?php

namespace App\Notifications;

use App\Referral;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReferralCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Referral $referral)
    {
        $this->referral = $referral;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
        //  return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url(env('APP_URL').'/'.$this->referral->id);

    return (new MailMessage)
                ->greeting('Hello!')
                ->line('A new referral with ' .$this->referral->company.' and '.$this->referral->name.' was finalized!')
                ->action('View Referral', $url)
                ->line('Contact '.$this->referral->user->name.' for more info on this new partnership!');
    }


    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->referral->name,
            'company' => $this->referral->company,
            'user_id' => $this->referral->user_id,
            'note' => $this->referral->note
        ];
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
