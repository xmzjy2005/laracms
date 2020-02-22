<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisterMailNotify extends Notification implements ShouldQueue
{
    use Queueable;
protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
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
        //模拟邮件发送等待情况，如果是用队列，放到后台执行，则不阻塞用户
        sleep(3);
        return (new MailMessage)
                    ->subject('验证邮箱')
                    ->greeting(config('app.name'))
                    ->line('点击下面的按钮完成邮箱验证,不行的话就按这个'.route('check_register_mail',$this->user->mail_token))
                    ->action('验证邮箱', route('check_register_mail',$this->user->mail_token))
                    ->line('感谢使用我们的网站');
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
