<?php

namespace cccdl\adapay\Member;

use cccdl\adapay\Core\BaseCore;
use GuzzleHttp\Exception\GuzzleException;

class Member extends BaseCore
{

    /**
     * 请求前缀
     * @var string
     */
    protected $endpoint = '/v1/members';

    /**
     * 查询账户
     * @param $params
     * @return array
     * @throws GuzzleException
     */
    public function query($params): array
    {
        $this->setUrl('/' . $params['member_id']);
        $this->setGetParams($params);
        $this->setGetHeader();
        return $this->getGetBody();
    }


    /**
     * 创建用户对象
     * @param $params
     * @return array
     * @throws GuzzleException
     */
    public function create($params): array
    {
        $this->setUrl('');
        $this->setPostParams($params);
        $this->setPostHeader();
        return $this->getPostBody();

    }
}