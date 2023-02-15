<?php

namespace cccdl\adapay\Core;

class BaseCore
{
    /**
     * 请求域名
     * @var string
     */
    protected $baseUri = 'https://api.adapay.tech';

    /**
     * 请求最终url
     * @var string
     */
    private $url;

    /**
     * 请求前缀
     * @var string
     */
    protected $endpoint = '';


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

    protected $apiKeyLive;
    protected $rsaPrivateKey;
    protected $rsaPublicKey;

    public function __construct($config)
    {
        $this->apiKeyLive = $config['api_key_live'];
        $this->rsaPrivateKey = $config['rsa_private_key'];
        $this->rsaPublicKey = $config['rsa_public_key'];

        var_dump($this->apiKeyLive);
        var_dump($this->rsaPrivateKey);
        var_dump($this->rsaPublicKey);
    }

    /**
     * 设置url
     * @param $str
     * @return void
     */
    protected function setUrl($str): void
    {
        $this->url = $this->baseUri . $this->endpoint . $str;
        var_dump($this->url);
    }

    /**
     * 设置参数
     * @param $params
     * @return void
     */
    protected function setParams($params): void
    {
        ksort($params);
        $this->params = $this->doEmptyData($params);
        var_dump($this->params);
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
    protected function setHeader(): void
    {
        $this->header['Content-Type'] = 'text/html';
        $this->header['Authorization'] = $this->apiKeyLive;
        $this->header['Signature'] = $this->generateSignature($this->url, http_build_query($this->params));

        var_dump($this->header);
    }


    /**
     * @param $url
     * @param $params
     * @return string
     */
    private function generateSignature($url, $params): string
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
    private function sha1WithRsa($data): string
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