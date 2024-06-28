<?php

use App\Models\User;

if (!function_exists('sendNotifications')) {
    function sendNotifications($event, $user, $data, $creator): void
    {
        if ($user->role->name === 'admin') {
            $usersForSendNotification = User::query()->whereDoesntHave('role', function ($query) {
                $query->where('name', 'operator');
            })->get('id')->toArray();
            foreach ($usersForSendNotification as $userForSendNotification) {
                event(new $event($data, $userForSendNotification, $creator));
            }
        }
        if ($user->role->name === 'limited_admin') {
            $adminsForSendNotificatino = User::query()->whereHas('role', function ($query) {
                $query->where('name', 'admin');
            })->get('id')->toArray();

            $usersForSendNotification = User::query()->where('branch_id', $user->branch_id)
                ->where('id', '!=', $user->id)
                ->whereDoesntHave('role', function ($query) {
                    $query->whereIn('name', ['admin', 'operator']);
                })
                ->get('id')->toArray();
            foreach ($usersForSendNotification as $userForSendNotificatino) {
                event(new $event($data, $userForSendNotificatino, $creator));
            }
            foreach ($adminsForSendNotificatino as $adminForSendNotificatino) {
                event(new $event($data, $adminForSendNotificatino, $creator));
            }
        }
        if ($user->role->name === 'user') {
            $limitedAdminsForSendNotification = User::query()->where('branch_id', $user->branch_id)
                ->where('id', '!=', $user->id)
                ->whereHas('role', function ($query) {
                    $query->where('name', 'limited_admin');
                })
                ->get('id')->toArray();

            $adminsForSendNotification = User::query()->whereHas('role', function ($query) {
                $query->where('name', 'admin');
            })->get('id')->toArray();

            $usersForSendNotification = User::query()
                ->where('branch_id', $user->branch_id)
                ->where('id', '!=', $user->id)
                ->whereHas('role', function ($query) {
                    $query->where('name', 'user');
                })->get('id')->toArray();

            foreach ($usersForSendNotification as $userForSendNotification) {
                event(new $event($data, $userForSendNotification, $creator));
            }
            foreach ($limitedAdminsForSendNotification as $limitedAdminForSendNotification) {
                event(new $event($data, $limitedAdminForSendNotification, $creator));
            }
            foreach ($adminsForSendNotification as $adminForSendNotification) {
                event(new $event($data, $adminForSendNotification, $creator));
            }
        }
    }
}
