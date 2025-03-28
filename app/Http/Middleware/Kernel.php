<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */

     //Acara 4
    protected $routeMiddleware = [
        'check.profile' => \App\Http\Middleware\CheckProfileRoute::class,
    ];
}   