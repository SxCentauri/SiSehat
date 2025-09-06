<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route; // << perlu ini

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // muat routes web utama
        web: __DIR__ . '/../routes/web.php',

        // kalau tidak punya api.php, jangan isi 'api'
        // api: __DIR__ . '/../routes/api.php',

        // muat route untuk artisan commands (jika file ada)
        commands: __DIR__ . '/../routes/console.php',

        health: '/up',

        // >>> PENTING: auth.php dibungkus middleware 'web'
        then: function () {
            Route::middleware('web')->group(base_path('routes/auth.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // alias untuk middleware role
        $middleware->alias([
            'role' => \App\Http\Middleware\EnsureUserRole::class,
        ]);

        // tidak perlu append middleware web secara manual;
        // group 'web' sudah mengaktifkan session + share $errors.
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
