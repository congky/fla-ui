<?php
namespace FLA\Common\Middleware;

use FLA\Common\BusinessObject\BusinessFunction\user\FindUserByToken;
use FLA\Common\BusinessObject\BusinessFunction\user\ValTokenIsExists;
use FLA\Common\CommonExceptionsConstant;
use FLA\Core\CoreException;
use FLA\Core\Middleware\AbstractMiddleware;
use FLA\Core\Util\ResponseUtil;

class VerifyRequestMiddleware extends AbstractMiddleware
{
    protected function beforeRequest($request)
    {

        try {

            $token = $request->header('token');
            $task = $request->header('task');

            if (($token != null && $token != '')) {
                $valTokenIsExists = App::make("valTokenIsExists");
                $valTokenIsExists->execute(['token' => $token]);

                $findUserByToken = new FindUserByToken();
                $user = $findUserByToken->execute([
                    "token" => $token
                ]);

                $request["userLoginId"] = $user->user_id;
                $request["roleLoginId"] = $roleLogin;

            } else {
                throw new CoreException(CommonExceptionsConstant::TOKEN_IS_REQUIRED);
            }
        } catch (CoreException $ex) {
            ResponseUtil::isUnauthorized($ex);
        }
    }

    protected function afterRequest($request, &$response)
    {

    }
}