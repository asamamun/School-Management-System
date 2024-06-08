<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckStaff;
use App\Http\Middleware\CheckStudent;
use App\Http\Middleware\CheckTeacher;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['admin' => CheckAdmin::class]);
        $middleware->alias(['staff' => CheckStaff::class]);
        $middleware->alias(['teacher' => CheckTeacher::class]);
        $middleware->alias(['student' => CheckStudent::class]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
