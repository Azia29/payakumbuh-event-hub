<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // EventObserver dinonaktifkan agar harga event
        // tidak otomatis dicatat sebagai pemasukan.
    }
}