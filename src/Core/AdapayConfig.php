<?php

namespace cccdl\adapay\Core;

class AdapayConfig
{
    public $apiKeyLive;
    public $rsaPrivateKey;
    public $rsaPublicKey;

    public function __construct($config)
    {
        $this->apiKeyLive = $config['api_key_live'];
        $this->rsaPrivateKey = $config['rsa_private_key'];
        $this->rsaPublicKey = $config['rsa_public_key'];
    }
}