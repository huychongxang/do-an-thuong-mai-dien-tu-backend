<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return response()->view('web.pages.404');
        }

        if ($request->wantsJson()) {
            Log::info($request->all());
            Log::error($exception->getMessage());

            if ($exception instanceof \Illuminate\Validation\ValidationException) {
                $message = array_values($exception->errors())[0];
                if(gettype($message) == 'array'){
                    $message = $message[0];
                }
                return response()->json([
                    'code' => 422,
                    'success' => false,
                    'status' => "Fail",
                    'message' => $message,
                    'data' => $exception->errors()
                ], 422);
            }
            return response()->json([
                'code' => 422,
                'success' => false,
                'status' => "Fail",
                'message' => $exception->getMessage(),
            ], 422);
        }
        return parent::render($request, $exception);
    }
}
