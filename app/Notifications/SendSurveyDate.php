<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSurveyDate extends Notification implements ShouldQueue
{
    use Queueable;

    protected $berkasWakif;
    protected $tanggal;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($berkasWakif, $tanggal)
    {
        $this->berkasWakif = $berkasWakif;
        $this->tanggal = $tanggal;
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
                    ->subject('Pemberitahuan Jadwal Survey')
                    ->line('Jadwal survey ditetapkan pada tanggal:')
                    ->line(date('d-m-Y', strtotime($this->tanggal)) . ' Pukul ' . date('H:i', strtotime($this->tanggal)))
                    ->line('Tempat bertemu, sesuai dengan letak tanah yang anda ajukan')
                    ->line('Anda sebagai wakif, harus mengikuti kegiatan survey sesuai dengan tanggal tersebut bersama Petugas KUA')
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
