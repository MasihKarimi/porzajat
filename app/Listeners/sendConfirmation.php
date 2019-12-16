<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
class sendConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $comment_r=$event->comment;
        Mail::send('email.comment_confirm',['comment_r'=>$comment_r],function ($m) use ($comment_r){
            $m->from('info@poohana.com','Mujib Halimi Developer');
            $m->to($comment_r->email,$comment_r->sender);
            $m->subject('we receive your comment');
        });
    }
}
