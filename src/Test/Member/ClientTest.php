<?php

namespace cccdl\adapay\Test\Member;

use cccdl\adapay\Exception\cccdlException;
use cccdl\adapay\Member\Member;
use cccdl\adapay\Test\Config;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class ClientTest extends TestCase
{
    public function testQuery(): void
    {
        try {
            $params = [
                'app_id' => 'app_50831819-fc9e-4d2d-910c-c0e99b76e998',
                'member_id' => '3_431021199606114525',
            ];
            $config = Config::getConfig();
            $service = new Member($config);
            $res = $service->query($params);
        } catch (cccdlException $e) {
            $this->assertEquals('402', $e->getCode());
        }

        $data = json_decode($res['data'], true);
        var_dump($data);
        $this->assertEquals('succeeded', $data['status']);
    }
}