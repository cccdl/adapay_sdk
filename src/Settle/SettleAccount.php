<?php

namespace cccdl\adapay\Settle;

use cccdl\adapay\Exception\cccdlException;
use cccdl\adapay\Traits\Request;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class SettleAccount
{
    use Request;

    /**
     * 请求域名
     * @var string
     */
    private $baseUri = 'https://api.adapay.tech';

    /**
     * 请求前缀
     * @var string
     */
    private $endpoint = '/v1/settle_accounts/';

    /**
     * 请求最终url
     * @var string
     */
    private $url;
    private $apiKeyLive;
    private $rsaPrivateKey;
    private $rsaPublicKey;

    /**
     * 请求参数
     * @var array
     */
    private $params;

    /**
     * 头部
     * @var array|string[]
     */
    private $header;

    public function __construct($config)
    {
        $this->apiKeyLive = $config['api_key_live'];
        $this->rsaPrivateKey = $config['rsa_private_key'];
        $this->rsaPublicKey = $config['rsa_public_key'];
    }

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

    /**
     * 设置url
     * @param $str
     * @return void
     */
    private function setUrl($str): void
    {
        $this->url = $this->baseUri . $this->endpoint . $str;
    }

    /**
     * 设置参数
     * @param $params
     * @return void
     */
    private function setParams($params): void
    {
        ksort($params);
        $this->params = $this->doEmptyData($params);
    }


    private function doEmptyData($reqParams): array
    {
        return array_filter($reqParams, function ($v) {
            if (!empty($v) || $v == '0') {
                return true;
            }
            return false;
        });
    }

    /**
     * 设置头部
     * @return void
     */
    private function setHeader(): void
    {
        $this->header['Content-Type'] = 'text/html';
        $this->header['Authorization'] = $this->apiKeyLive;
        $this->header['Signature'] = $this->generateSignature($this->url, http_build_query($this->params));
    }


    /**
     * @param $url
     * @param $params
     * @return string
     */
    public function generateSignature($url, $params): string
    {
        if (is_array($params)) {
            $parameters = [];
            foreach ($params as $k => $v) {
                $parameters[$k] = $v;
            }
            $data = $url . json_encode($parameters);
        } else {
            $data = $url . $params;
        }
        return $this->sha1WithRsa($data);
    }

    /**
     * @param $data
     * @return string
     */
    public function sha1WithRsa($data): string
    {
        $priKey = $this->rsaPrivateKey;
        $key = "-----BEGIN PRIVATE KEY-----\n" . wordwrap($priKey, 64, "\n", true) . "\n-----END PRIVATE KEY-----";
        try {
            openssl_sign($data, $signature, $key);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return base64_encode($signature);
    }
}