<?php
namespace FLA\UI\Middleware;

use FLA\Core\GeneralConstant;
use FLA\Core\Middleware\AbstractMiddleware;
use FLA\UI\UiConstant;
use Illuminate\Support\Facades\Cookie;

class AuthMiddleware extends AbstractMiddleware
{

    protected function beforeRequest($request)
    {
    }

    protected function afterRequest($request, &$response)
    {
        if (GeneralConstant::_OK == $request["_status"]) {

            $responseContent = json_decode($response->getContent());
            $token = GeneralConstant::_EMPTY_VALUE;

            if(property_exists($responseContent, "token")) {
                $token = $responseContent->token;
            }

            $service = $request->get("service");

            if (UiConstant::_SERVICE_LOGIN == $service) {

                $response->withCookie(Cookie::forever('FLA-TOKEN', $token, null, null, false, false));

            } elseif (UiConstant::_SERVICE_LOGOUT == $service) {

                $response->withCookie(Cookie::forget('FLA-TOKEN'));

            }
        }
    }
}