<?php

namespace cccdl\adapay\Payment;

use cccdl\adapay\Core\BaseCore;
use GuzzleHttp\Exception\GuzzleException;

class Payment extends BaseCore
{
    /**
     * 请求前缀
     * @var string
     */
    protected $endpoint = '/v1/payments';

    /**
     * 创建支付对象
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function create(array $params): array
    {
        $this->setUrl('');
        $this->setPostParams($params);
        $this->setPostHeader();
        return $this->getPostBody();
    }

}