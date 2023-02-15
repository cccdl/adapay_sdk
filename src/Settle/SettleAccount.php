<?php

namespace cccdl\adapay\Settle;

use cccdl\adapay\Core\BaseCore;
use cccdl\adapay\Exception\cccdlException;
use cccdl\adapay\Traits\Request;
use GuzzleHttp\Exception\GuzzleException;

class SettleAccount extends BaseCore
{
    use Request;

    /**
     * 请求前缀
     * @var string
     */
    protected $endpoint = '/v1/settle_accounts/';

    /**
     * 查询余额
     * @param array $params
     * @return array
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function balance(array $params): array
    {
        $this->setUrl('balance');
        $this->setParams($params);
        $this->setHeader();
        return $this->getGetBody();
    }

}