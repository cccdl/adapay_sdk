<?php

namespace cccdl\adapay\Test\Sign;

use cccdl\adapay\Core\AdapayConfig;
use cccdl\adapay\Exception\cccdlException;
use cccdl\adapay\SignTool\SignTool;
use cccdl\adapay\Test\Config;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class ClientTest extends TestCase
{
    /**
     * @return void
     * @throws cccdlException
     */
    public function testVerifySign(): void
    {
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new SignTool($adapayConfig);
        $res = $service->checkSign();

        //断言正常结果
        $this->assertTrue($res);
    }


}