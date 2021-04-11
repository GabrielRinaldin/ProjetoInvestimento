<?php

namespace App\Listeners;

class UserEventSubscriber
{
    
    public function onUserLogin($event)
    {   
        $access = new \App\Entities\Access();
        $access->user_id = auth()->user()->id;
        $access->login = now();
        $access->save();
    }


    public function onUserLogout($event)
    {
        $access = \App\Entities\Access::where('user_id', auth()->user()->id)->orderby('id', 'desc')->first();
        $access->logout = now();
        $access->logged_time = now()->diffAsCarbonInterval($access->login);
        $access->save();
    }

    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
}
