<?php

namespace cccdl\adapay\Member;

use cccdl\adapay\Core\BaseCore;

class Member extends BaseCore
{

    /**
     * 请求前缀
     * @var string
     */
    private $endpoint = '/v1/members/';

    /**
     * 查询账户
     * @return void
     */
    public function query($params)
    {
        $this->setUrl('balance');
        $this->setParams($params);
        $this->setHeader();
        return $this->getGetBody();
    }
}