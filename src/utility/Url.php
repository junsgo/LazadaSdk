<?php
/**
 *
 * author 46231996
 * create 2022/4/4
 * copyright 比邻科技
 */

namespace Jack\LazadaSdk\utility;

class Url
{
    const API_VERSION = "v1";
    //const AUTHORIZATION_URL = "https://auth.lazada.com/rest";
    const AUTHORIZATION_URL = "https://auth.lazada.com/oauth/authorize";
    const GATEWAY_URL = "https://api.lazada.com/rest";
    const GATEWAY_URL_SG = "https://api.lazada.sg/rest";
    const GATEWAY_URL_MY = "https://api.lazada.com.my/rest";
    const GATEWAY_URL_VN = "https://api.lazada.vn/rest";
    const GATEWAY_URL_TH = "https://api.lazada.co.th/rest";
    const GATEWAY_URL_PH = "https://api.lazada.com.ph/rest";
    const GATEWAY_URL_ID = "https://api.lazada.co.id/rest";

    public static function getAuthorizationUrl($client_id, $redirect_uri, $scope, $state, $response_type = "code")
    {
        $params = array(
            "client_id" => $client_id,
            "redirect_uri" => $redirect_uri,
            "scope" => $scope,
            "state" => $state,
            "response_type" => $response_type
        );
        return self::AUTHORIZATION_URL . "?" . http_build_query($params);
    }

    public static function getGatewayUrl($country_code)
    {
        switch ($country_code) {
            case "SG":
                return self::GATEWAY_URL_SG;
            case "MY":
                return self::GATEWAY_URL_MY;
            case "VN":
                return self::GATEWAY_URL_VN;
            case "TH":
                return self::GATEWAY_URL_TH;
            case "PH":
                return self::GATEWAY_URL_PH;
            case "ID":
                return self::GATEWAY_URL_ID;
            default:
                return self::GATEWAY_URL;
        }
    }

    public static function getApiVersion()
    {
        return self::API_VERSION;
    }
}