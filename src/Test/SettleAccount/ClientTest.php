<?php

namespace cccdl\adapay\Test\SettleAccount;

use cccdl\adapay\Core\AdapayConfig;
use cccdl\adapay\Settle\SettleAccount;
use cccdl\adapay\Test\Config;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class ClientTest extends TestCase
{
    public function testBalance(): void
    {
        $params = [
            'app_id' => '',
            'member_id' => 0,
            'acct_type' => '02',
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new SettleAccount($adapayConfig);
        $res = $service->balance($params);
        var_dump($res);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


    public function testQuery(): void
    {
        $params = [
            'app_id' => '',
            'member_id' => '',
            'settle_account_id' => ''
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new SettleAccount($adapayConfig);
        $res = $service->query($params);
        var_dump($res);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }

    public function testCreate(): void
    {
        $params = [
            'app_id' => '',
            'member_id' => '',
            'channel' => 'bank_account',
            'account_info' => [
                'card_id' => '',
                'card_name' => '',
                'tel_no' => '',
                'bank_acct_type' => 2,
                'cert_id' => '',
                'cert_type' => '00'
            ]
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new SettleAccount($adapayConfig);
        $res = $service->create($params);
        var_dump($res);

        //断言错误结果
        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


    public function testDelete(): void
    {
        $params = [
            'app_id' => '',
            'member_id' => '',
            'settle_account_id' => ''
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new SettleAccount($adapayConfig);
        $res = $service->delete($params);


        var_dump($res);

        //断言错误结果
//        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


}