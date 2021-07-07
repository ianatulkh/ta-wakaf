<?php

namespace App\Notifications;

use App\BerkasWakif;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendReviewDataAcc extends Notification implements ShouldQueue
{
    use Queueable;

    protected $berkasWakif;
    protected $ket_ditolak;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($berkasWakif, $ket_ditolak)
    {
        $this->berkasWakif = $berkasWakif;
        $this->ket_ditolak = $ket_ditolak;
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
                    ->subject('Selamat ! Pengajuan Wakaf Anda Disetujui')
                    ->line('Selamat, Pengajuan Wakaf untuk keperluan '. $this->berkasWakif->keperluan)
                    ->line('Berkas persyaratan yang anda kirimkan telah disetujui oleh petugas KUA, berikut pesan yang disampaikan')
                    ->line($this->ket_ditolak)
                    ->line('Selanjutnya silahkan untuk menunggu jadwal untuk survey tempat tanah wakaf')
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
