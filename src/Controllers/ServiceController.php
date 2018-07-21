<?php
namespace FLA\UI\Controllers;


use FLA\Core\BaseControllers;
use FLA\Core\CoreException;
use FLA\Core\Util\ResponseUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ServiceController extends BaseControllers
{

    public function call(Request $request){

        try {
            $input = [
                "_header"=> $request->header(),
                "_body"=> [
                    "service" => $request->get("service"),
                    "payload" => $request->get("payload")
                ]
            ];
            $callService = App::make("callService");
            $response = $callService->execute($input);

            return $response;
        } catch (CoreException $ex) {
            return ResponseUtil::isFail($ex);
        }

    }

}