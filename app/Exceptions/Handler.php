<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Common\Lib\Result;
use App\Common\Lib\TelegramNotice;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\ErrorHandler\Exception\FlattenException;


class Handler extends ExceptionHandler
{
    
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ValidationException::class,
        ValidatorException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
       
    ];

    /**
     * @param Throwable $exception
     * @throws Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * 重写异常
     * @param \Illuminate\Http\Request $request
     * @param Throwable $e
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \ReflectionException
     */
    public function render($request, Throwable $exception)
    {
       if($exception instanceof ValidatorException) {
            $messages = $exception->getMessageBag()->toArray();
            $msg = '';
            
            foreach ($messages as $message) {
                $msg .= $message[0] ?? '';
            }
            
            return Result::error($msg, 4220, 422);
        } 
        elseif($exception instanceof OutputException) {
            return response()->view('mobile.errors.error', ['msg' => $exception->getMessage()]);
        }

        return parent::render($request, $exception);
    }
}
