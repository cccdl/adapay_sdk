<?php

use cccdl\adapay\Core\AdapayConfig;
use cccdl\adapay\Refund\Refund;
use cccdl\adapay\Test\Config;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class ClientTest extends TestCase
{
    public function testCreate(): void
    {
        $params = [
            'id' => '',
            'refund_order_no' => '',
            'refund_amt' => '6.00'
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new Refund($adapayConfig);
        $res = $service->create($params);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


    public function testQuery(): void
    {
        $params = [
            'payment_id' => ''
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new Refund($adapayConfig);
        $res = $service->query($params);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }
}