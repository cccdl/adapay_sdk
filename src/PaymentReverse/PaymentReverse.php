<?php

namespace cccdl\adapay\PaymentReverse;

use cccdl\adapay\Core\BaseCore;
use GuzzleHttp\Exception\GuzzleException;

class PaymentReverse extends BaseCore
{
    /**
     * 请求前缀
     * @var string
     */
    protected $endpoint = '/v1/payments/reverse';


    /**
     * 创建支付撤销对象
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


    /**
     * 查询支付撤销对象
     * @param $params
     * @return array
     * @throws GuzzleException
     */
    public function query($params): array
    {
        $this->setUrl('/' . $params['reverse_id']);
        $this->setGetParams($params);
        $this->setGetHeader();
        return $this->getGetBody();
    }


    /**
     * 查询支付撤销对象列表
     * @param $params
     * @return array
     * @throws GuzzleException
     */
    public function queryList($params): array
    {
        $this->setUrl('/list');
        $this->setGetParams($params);
        $this->setGetHeader();
        return $this->getGetBody();
    }


}