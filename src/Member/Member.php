<?php

namespace cccdl\adapay\Member;

use cccdl\adapay\Core\BaseCore;
use cccdl\adapay\Exception\cccdlException;
use GuzzleHttp\Exception\GuzzleException;

class Member extends BaseCore
{

    /**
     * 请求前缀
     * @var string
     */
    protected $endpoint = '/v1/members/';

    /**
     * 查询账户
     * @param $params
     * @return void
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function query($params)
    {

        $this->setUrl($params['member_id']);
        $this->setParams($params);
        $this->setHeader();
        return $this->getGetBody();

    }
}