<?php

namespace cccdl\adapay\Test\SettleAccount;

use cccdl\adapay\Settle\SettleAccount;
use cccdl\adapay\Test\Config;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class ClientTest extends TestCase
{
    public function testBalance(): void
    {
        $params = [
            'app_id' => 'app_50831819-fc9e-4d2d-910c-c0e99b76e998',
            'member_id' => 0,
            'acct_type' => '02',
        ];
        $config = Config::getConfig();
        $service = new SettleAccount($config);
        $res = $service->balance($params);
        $data = json_decode($res['data'], true);
        var_dump($data);
        $this->assertEquals('succeeded', $data['status']);
    }
}