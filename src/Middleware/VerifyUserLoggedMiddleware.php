<?php
namespace FLA\UI\Middleware;

use FLA\Core\GeneralConstant;
use FLA\Core\Middleware\AbstractMiddleware;

class VerifyUserLoggedMiddleware extends AbstractMiddleware
{
    protected function beforeRequest($request)
    {
        if (!$request->session()->get(GeneralConstant::_FLA_SESSION)) {
            return redirect('/login');
        }
    }

    protected function afterRequest($request, &$response)
    {

    }

}