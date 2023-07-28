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
        
        if ($this->shouldReport($exception) && config('app.env') != 'local') {
            $this->sendEmail($exception); 
        }
        
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

        return parent::render($request, $exception);
    }

    public function sendEmail(Throwable $exception)
    {

        
        $response = [];

        $error = $this->convertExceptionToResponse($exception);
        $exception = FlattenException::create($exception);


        $response['status'] = $error->getStatusCode();
        $response['file'] =  $exception->getFile();
        $response['class'] = $exception->getClass();
        $response['line'] =  $exception->getLine();
        $response['play'] = env('CURRENT_PLAT', 'Laravel');
        $response['msg'] = empty($exception->getMessage()) ? 'something error' : $exception->getMessage();
        // $response['trace'] = $exception->getTrace();

        TelegramNotice::sendMessage($response);
      
        // print_r(json_encode($response));
        // // print_r($error->getMessage());
        // die();
        // try {
           
        //     $e = FlattenException::createFromThrowable($exception);
        //     $handler = new HtmlErrorRenderer(true);
            
        //     $css = $handler->getStylesheet();
        //     $content = $handler->getBody($e);
           
        //     Mail::to('1043791113@qq.com')->send(new ExceptionOccurred($content,$css));
        // } catch (Throwable $exception) {
        //     print_r($exception->getMessage);die();
        //     // Log::error($exception);
        // }
    }
}
