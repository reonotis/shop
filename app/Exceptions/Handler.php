<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

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

    // /**
    //  * 認証していない場合にガードを見てそれぞれのログインページへ飛ばず
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @param \Illuminate\Auth\AuthenticationException $exception
    //  * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
    //  */
    // public function unauthenticated($request, AuthenticationException $exception)
    // {
    //     // return $this->shouldReturnJson($request, $exception)
    //     //             ? response()->json(['message' => $exception->getMessage()], 401)
    //     //             : redirect()->guest($exception->redirectTo() ?? route('login'));

    //     if($request->expectsJson()){
    //         return response()->json(['message' => $exception->getMessage()], 401);
    //     }

    //     if (in_array('admin', $exception->guards())) {
    //         return redirect()->guest(route('admin.login'));
    //     }

    //     return redirect()->guest(route('login'));
    // }

}
