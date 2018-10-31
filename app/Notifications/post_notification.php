<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class post_notification extends Notification
{
    use Queueable;


    protected $us;
    public $cv;
    public $emploi;

    public function __construct($us,$cv,$emploi)
    {
        $this->us=$us;
        $this->emploi=$emploi;
        $this->cv=$cv;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase()
    {
        return [
            'ide' => $this->emploi->id,
            'idc' => $this->cv->id,
            'id' => $this->us->id,
            'avatar' => $this->us->avatar,
            'nom' => $this->us->name,
            'message'=> "Demande a accepter votre demmande"
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
