<?php

namespace cccdl\adapay\Traits;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

trait Request
{

    /**
     * get请求
     * @return array
     * @throws GuzzleException
     */
    public function getGetBody(): array
    {
        try {
            $client = new Client();
            $response = $client->request('GET', $this->url, ['query' => $this->params, 'headers' => $this->header]);

            $res = $response->getBody()->getContents();
        } catch (RequestException|ClientException $e) {
            $res = $e->getResponse()->getBody()->getContents();
        }

        $res = json_decode($res, true);
        $res['data'] = json_decode($res['data'], true);

        return $res;

    }

    /**
     * get请求
     * @return array
     * @throws GuzzleException
     */
    public function getPostBody(): array
    {
        try {
            $client = new Client();
            $response = $client->request('POST', $this->url, ['json' => $this->params, 'headers' => $this->header]);

            $res = $response->getBody()->getContents();
        } catch (RequestException|ClientException $e) {
            $res = $e->getResponse()->getBody()->getContents();
        }

        $res = json_decode($res, true);
        $res['data'] = json_decode($res['data'], true);

        return $res;

    }
}