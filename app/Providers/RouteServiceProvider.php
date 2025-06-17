<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public static function redirectTo(): string
    {
        $user = auth()->user();
        if ($user && $user->role === 'admin') {
            return '/admin/dashboard';
        }

        return '/dashboard';
    }
}