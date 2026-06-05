<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Domains.Shared.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
