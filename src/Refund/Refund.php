<?php

namespace cccdl\adapay\Refund;

use cccdl\adapay\Core\BaseCore;
use GuzzleHttp\Exception\GuzzleException;

class Refund extends BaseCore
{
    /**
     * 请求前缀
     * @var string
     */
    protected $endpoint = '/v1/payments';

    /**
     * 创建退款对象
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function create(array $params): array
    {
        $this->setUrl('/' . $params['id'] . '/refunds');
        $this->setPostParams($params);
        $this->setPostHeader();
        return $this->getPostBody();
    }

    /**
     * 查询退款对象
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function query(array $params): array
    {
        $this->setUrl('/refunds');
        $this->setGetParams($params);
        $this->setGetHeader();
        return $this->getGetBody();
    }
}