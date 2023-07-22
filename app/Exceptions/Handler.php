<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Common\Lib\Result;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response; 

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
        // 默认通道
        // $this->shouldReport($exception) and \ExceptionNotifier::report($exception);
        // $this->shouldReport($exception) and app('exception.notifier')->report($exception);
        \ExceptionNotifier::reportIf($this->shouldReport($exception), $exception);
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

            // if($request->ajax()){
                return Result::error($msg, 4220, 422);
            // }else{
            //     $params = [
            //         'msg'  => $msg,
            //         'wait' => 33,
            //         'url'  => 'javascript:history.back(-1);',
            //     ];
            //     return response()->view('mobile.errors.error', $params, 500);
            // }
            
        }

        return parent::render($request, $exception);
    }
}
