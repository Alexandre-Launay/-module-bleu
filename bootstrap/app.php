<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $exception, Request $request) {
            return response()->json([
                'error' => 'Not Found.'
            ], 404);
        });

        $exceptions->render(function (AuthorizationException $exception, Request $request) {
            return response()->json([
                'error' => 'This action is unauthorized.'
            ], 403);
        });

        $exceptions->render(function (AccessDeniedHttpException $exception, Request $request) {
            return response()->json([
                'error' => 'This action is unauthorized.'
            ], 403);
        });

        $exceptions->render(function (QueryException $exception, Request $request) {
            return Response()->json([
                'error' => "An error occurred while retrieving data. Please try again later."
            ], 500);
        });

        // $exceptions->render(function (AuthenticationException $exception, Request $request) {
        //     return ResponseError($exception,"You have to login first",401);
        // });
    })->create();
