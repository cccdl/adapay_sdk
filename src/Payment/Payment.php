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


    /**
     * 查询支付对象
     * @param $params
     * @return array
     * @throws GuzzleException
     */
    public function query($params): array
    {
        $this->setUrl('/' . $params['payment_id']);
        $this->setGetParams($params);
        $this->setGetHeader();
        return $this->getGetBody();
    }


    /**
     * 查询支付对象列表
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


    /**
     * 关闭支付对象 针对已经创建的 支付对象，您可以调用关单接口进行交易的关闭。调用此接口后，该用户订单将不再能支付成功。
     * @param $params
     * @return array
     * @throws GuzzleException
     */
    public function close($params): array
    {
        $this->setUrl('/' . $params['payment_id'] . '/close');
        $this->setPostParams($params);
        $this->setPostHeader();
        return $this->getPostBody();
    }
}