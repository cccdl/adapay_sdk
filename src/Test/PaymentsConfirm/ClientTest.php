<?php

namespace cccdl\adapay\Test\Payments;

use cccdl\adapay\Core\AdapayConfig;
use cccdl\adapay\PaymentsConfirm\PaymentsConfirm;
use cccdl\adapay\Test\Config;
use PHPUnit\Framework\TestCase;


require '../../../vendor/autoload.php';

class ClientTest extends TestCase
{

    public function testQuery(): void
    {
        $params = [
            'payment_confirm_id' => ''
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new PaymentsConfirm($adapayConfig);
        $res = $service->query($params);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


    public function testCreate(): void
    {
        $params = [
            'payment_id' => '',
            'order_no' => '',
            'confirm_amt' => '6.00',
            'div_members' => [
                [
                    'member_id' => '',
                    'amount' => '6.00',
                ]
            ],
            'fee_mode' => 'O'
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new PaymentsConfirm($adapayConfig);
        $res = $service->create($params);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


    public function testQueryList(): void
    {
        $params = [
            'app_id' => '',
            'page_index' => 8,
            'page_size' => 20,
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new PaymentsConfirm($adapayConfig);
        $res = $service->queryList($params);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }
}