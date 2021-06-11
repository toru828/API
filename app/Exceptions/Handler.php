<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class Handler extends ExceptionHandler
{

    // public function render($request, Throwable  $exception)
    // {
    //     // This will replace our 404 response with
    //     // a JSON response.
    //     if ($exception instanceof ModelNotFoundException )
    //     {
    //         return response()->json([
    //             'data' => 'Resource not found'
    //         ], 404);
    //     }

    //     return parent::render($request, $exception);
    // }

    public function render($request, Throwable  $exception)
    {
        // This will replace our 404 response with
        // a JSON response.
        if ($exception instanceof ModelNotFoundException )
        {
            return response()->json([
                'data' => 'Resource not found'
            ], 404);
        // Add for handle unauthenticated
        } else if ($exception instanceof AuthenticationException) {
            return response()->json([
                'data' => 'Unauthenticated'
            ], 401);
        }

        return parent::render($request, $exception);
    }
}
