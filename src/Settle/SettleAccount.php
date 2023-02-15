<?php

namespace cccdl\adapay\Settle;

use cccdl\adapay\Core\BaseCore;
use GuzzleHttp\Exception\GuzzleException;

class SettleAccount extends BaseCore
{
    /**
     * 请求前缀
     * @var string
     */
    protected $endpoint = '/v1/settle_accounts';

    /**
     * 查询余额
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function balance(array $params): array
    {
        $this->setUrl('/balance');
        $this->setGetParams($params);
        $this->setGetHeader();
        return $this->getGetBody();
    }

}