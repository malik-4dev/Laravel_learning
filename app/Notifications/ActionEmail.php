<?php

namespace App\Notifications;

use App\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class ActionEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $companies;
    public function __construct(Company $company)
    {
        $this->companies=$company;
        //
        //$this->company=$company;
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
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('changelog@crm.com', 'CRM')
            ->line('someone create a new company. If it is not you go reset your password. ')
            ->action('Click Here To Reset Password', url('/password/reset'))
            ->line('If it is You Discard this email!');    }

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
            'company_id'=>$this->companies->id,
            'company_name'=>$this->companies->name
        ];
    }
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->content($this->companies->name)->from('+92 303 4346076');
    }
}
