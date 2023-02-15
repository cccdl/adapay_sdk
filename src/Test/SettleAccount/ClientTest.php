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
            'app_id' => '',
            'member_id' => 0,
        ];
        $config = Config::getConfig();
        $service = new SettleAccount($config);
        $res = $service->balance($params);
        $data = json_decode($res['data'], true);
        var_dump($data);
        $this->assertEquals('succeeded', $data['status']);
    }
}