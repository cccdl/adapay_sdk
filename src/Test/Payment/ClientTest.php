<?php

use cccdl\adapay\Core\AdapayConfig;
use cccdl\adapay\Exception\cccdlException;
use cccdl\adapay\Payment\Payment;
use cccdl\adapay\Test\Config;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class ClientTest extends TestCase
{
    public function testCreate(): void
    {
        $params = [
            'app_id' => '',
            'order_no' => 'aaaaa1',
            'pay_channel' => 'alipay',
            'pay_mode' => 'delay',
            'pay_amt' => '9.00',
            'goods_title' => '商品特吃',
            'goods_desc' => '商品特吃',
            'notify_url' => '',
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new Payment($adapayConfig);
        $res = $service->create($params);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


    /**
     * @return void
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function testQuery(): void
    {
        $params = [
            'payment_id' => '',
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new Payment($adapayConfig);
        $res = $service->query($params);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);

        //断言错误结果
        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }

    public function testQueryList(): void
    {
        $params = [
            'app_id' => '',
            'page_index' => 1,
            'page_size' => 20,
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new Payment($adapayConfig);
        $res = $service->queryList($params);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


    public function testClose(): void
    {
        $params = [
            'payment_id' => '',
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new Payment($adapayConfig);
        $res = $service->close($params);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }
}
