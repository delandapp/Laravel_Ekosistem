<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Exceptions\UnauthorizedException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // TODO: Add your middleware here

        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // TODO : Add your exception handler here

        $exceptions->render(function (UnauthorizedException  $e, $request) {
            if ($e instanceof UnauthorizedException) {
                return response()->view('errors.index', ['exception' => $e->getMessage()]);
            }
            return parent::render($request, $e);
        });
    })->create();
