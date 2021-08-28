<?php

namespace App\Observers;

use App\models\User;
use App\Notifications\user_regist_notification;
use Illuminate\Support\Facades\Notification;

class regist_notification
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\App\models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        Notification::send($user , new user_regist_notification($user));
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\App\models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\App\models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\App\models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\App\models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
