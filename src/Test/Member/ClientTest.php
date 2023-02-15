<?php

namespace cccdl\adapay\Test\Member;

use cccdl\adapay\Member\Member;
use cccdl\adapay\Test\Config;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testQuery(): void
    {
        $params = [
            'app_id' => '',
            'member_id' => 0,
        ];
        $config = Config::getConfig();
        $service = new Member($config);
        $res = $service->query($params);
        $data = json_decode($res['data'], true);
        var_dump($data);
        $this->assertEquals('succeeded', $data['status']);
    }
}