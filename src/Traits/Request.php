<?php

namespace cccdl\adapay\Traits;


use cccdl\adapay\Exception\cccdlException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

trait Request
{

    /**
     * get请求
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function getGetBody(): array
    {

        try {
            $client = new Client();
            $response = $client->request('GET', $this->url, ['query' => $this->params, 'headers' => $this->header]);

            if ($response->getStatusCode() != 200) {
                throw new cccdlException('请求失败: ' . $response->getStatusCode());
            }
        } catch (ClientException $e) {
            if ($e->getCode() != 200) {
                throw new cccdlException('请求失败:', $e->getCode());
            }
        }

        return json_decode($response->getBody(), true);


    }
}