<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewWatcher extends Notification implements ShouldQueue
{
    use Queueable;

    protected $propuesta;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($propuesta)
    {
        $this->propuesta = $propuesta;
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
        return (new MailMessage)
            ->greeting('¡Hola!')
            ->line('Se te ha asignado la prupuesta "X"')
            ->action('Ver propuesta', url('/propuestas/' . $this->propuesta->id))
            ->line('¡Gracias por usar Jupiter!');
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
