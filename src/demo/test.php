<?php
/**
 *
 * author 46231996
 * create 2022/4/4
 */


use Jack\LazadaSdk\LazadaClient;
use Jack\LazadaSdk\LazadaRequest;


class lazada
{

    public $lazada;
    public $partner_id;
    public $partner_key;
    public $access_token;
    public $auth_url = 'https://auth.lazada.com/rest';
    public $api_url = 'https://api.lazada.vn/rest';

    public function __construct($access_token = '')
    {
        $this->partner_id = 'Lazada App ID';
        $this->partner_key = 'Lazada App Secret';
        $this->access_token = $access_token;
        $this->lazada = new LazadaClient($this->api_url, $this->partner_id, $this->partner_key);
    }

    public function request($path, $params = [], $method = 'GET')
    {
        $request = new LazadaRequest($path, $method);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $request->addApiParam($key, $value);
            }
        }
        return $this->lazada->execute($request, $this->access_token);
    }

    public function authorization($return_url)
    {
        try {
            $auth_url = 'https://auth.lazada.com/oauth/authorize?response_type=code&force_auth=true&redirect_uri=' . $return_url . "&client_id=" . $this->partner_id;
            return $auth_url;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function get_access_token($code)
    {
        try {
            $lazada = new LazadaClient($this->auth_url, $this->partner_id, $this->partner_key);
            $request = new LazadaRequest('/auth/token/create');
            $request->addApiParam('code', $code);
            return $lazada->execute($request);
        } catch (\Exception $e) {
            return false;
        }
    }
}