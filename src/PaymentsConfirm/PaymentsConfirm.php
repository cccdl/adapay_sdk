<?php

namespace cccdl\adapay\PaymentsConfirm;

use cccdl\adapay\Core\BaseCore;
use GuzzleHttp\Exception\GuzzleException;

class PaymentsConfirm extends BaseCore
{
    /**
     * 请求前缀
     * @var string
     */
    protected $endpoint = '/v1/payments/confirm';


    /**
     * 查询支付确认对象
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function query(array $params): array
    {
        $this->setUrl('/' . $params['payment_confirm_id']);
        $this->setGetParams($params);
        $this->setGetHeader();
        return $this->getGetBody();
    }

    /**
     * 查询支付确认对象列表
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function queryList(array $params): array
    {
        $this->setUrl('/list');
        $this->setGetParams($params);
        $this->setGetHeader();
        return $this->getGetBody();
    }


    /**
     * 创建支付确认对象
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