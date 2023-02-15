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


    /**
     * 查询结算对象
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function query(array $params): array
    {
        $this->setUrl('/' . $params['settle_account_id']);
        $this->setGetParams($params);
        $this->setGetHeader();
        return $this->getGetBody();
    }

    /**
     * 创建结算对象
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
     * 删除结算对象
     * @param $params
     * @return array
     * @throws GuzzleException
     */
    public function delete($params): array
    {
        $this->setUrl('/delete');
        $this->setPostParams($params);
        $this->setPostHeader();
        return $this->getPostBody();

    }
}