<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendAfterSurveyMessage extends Notification implements ShouldQueue
{
    use Queueable;

    protected $berkasWakif;
    protected $pesan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($berkasWakif, $pesan)
    {
        $this->berkasWakif = $berkasWakif;
        $this->pesan = $pesan;
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
                    ->subject('Pemberitahuan Selesainya Akta Ikrar')
                    ->line('Selamat, akta ikrar anda dikonfirmasikan telah dibuat, berikut pesan yang disampaikan petugas KUA:')
                    ->line($this->pesan)
                    ->line('Selanjutnya, silahkan untuk mengesahkan akta ikrar dengan menandatangani berkas tersebut di kantor KUA Pulosari Kab. Pemalang')
                    ->action('Lihat Status Pengajuan', route('wakif.pengajuan-wakaf.show', $this->berkasWakif->id))
                    ->line('Terimakasih');
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
