<?php

namespace cccdl\adapay\Core;

use cccdl\adapay\Exception\cccdlException;
use cccdl\adapay\Traits\Request;
use Exception;

class BaseCore
{
    use Request;

    /**
     * 请求域名
     * @var string
     */
    protected $baseUri = 'https://api.adapay.tech';

    /**
     * 请求最终url
     * @var string
     */
    protected $url;

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

    /**
     * @var
     */
    protected $adapayConfig;


    /**
     * @throws cccdlException
     */
    public function __construct($adapayConfig)
    {

        if (!($adapayConfig instanceof AdapayConfig)) {
            throw new cccdlException('配置异常');
        }

        $this->adapayConfig = $adapayConfig;
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
     * 设置get参数
     * @param $params
     * @return void
     */
    protected function setGetParams($params): void
    {
        ksort($params);
        $this->params = $this->doEmptyData($params);
    }


    /**
     * 设置post参数
     * @param $params
     * @return void
     */
    protected function setPostParams($params): void
    {
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
     * 设置get头部
     * @return void
     */
    protected function setGetHeader(): void
    {
        $this->header['Content-Type'] = 'text/html';
        $this->header['Authorization'] = $this->adapayConfig->apiKeyLive;
        $this->header['Signature'] = $this->generateSignature($this->url, http_build_query($this->params));
        var_dump($this->header);
    }


    /**
     * 设置post头部
     * @return void
     */
    protected function setPostHeader(): void
    {
        $this->header['Content-Type'] = 'application/json';
        $this->header['Authorization'] = $this->adapayConfig->apiKeyLive;
        $this->header['Signature'] = $this->generateSignature($this->url, $this->params);
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
        $priKey = $this->adapayConfig->rsaPrivateKey;
        $key = "-----BEGIN PRIVATE KEY-----\n" . wordwrap($priKey, 64, "\n", true) . "\n-----END PRIVATE KEY-----";
        try {
            openssl_sign($data, $signature, $key);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return base64_encode($signature);
    }
}