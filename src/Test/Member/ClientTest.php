<?php

namespace cccdl\adapay\Test\Member;

use cccdl\adapay\Core\AdapayConfig;
use cccdl\adapay\Exception\cccdlException;
use cccdl\adapay\Member\Member;
use cccdl\adapay\Test\Config;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class ClientTest extends TestCase
{
    /**
     * @return void
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function testQuery(): void
    {
        $params = [
            'app_id' => '',
            'member_id' => '',
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new Member($adapayConfig);
        $res = $service->query($params);
        var_dump($res);

        //断言错误结果
        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


    public function testCreate(): void
    {
        $params = [
            'app_id' => '',
            'member_id' => '',
        ];
        $config = Config::getConfig();
        $adapayConfig = new AdapayConfig($config);
        $service = new Member($adapayConfig);
        $res = $service->create($params);


        var_dump($res);

        //断言错误结果
        $this->assertEquals('failed', $res['data']['status']);

        //断言正常结果
        $this->assertEquals('succeeded', $res['data']['status']);
    }


}