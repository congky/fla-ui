<?php
namespace FLA\UI;

use FLA\Core\AbstractCurl;
use FLA\Core\Util\GeneralUtil;
use FLA\Core\Util\ValidationUtil;

class CallService extends AbstractCurl
{

    protected function process($dto)
    {

        ValidationUtil::valBlankOrNull($dto, "header");
        ValidationUtil::valBlankOrNull($dto, "body");

        $this->setUrl(GeneralUtil::getDefine("ServiceUrl", "127.0.0.1:8100/api/fla-auth-service"));
        $this->setMethod("POST");
        $this->setHeader($dto["_header"]);
        $this->setBody($dto["_body"]);

        return $this->call();
    }
}