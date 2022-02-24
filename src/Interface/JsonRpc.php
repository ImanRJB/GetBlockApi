<?php

namespace GetBlockApi\Interface;

use Illuminate\Support\Facades\Http;

class JsonRpc
{
    private $api_key;
    private $url;

    public function __construct($url)
    {
        $this->api_key      = config('getblock.api_key');
        $this->url          = $url;
    }

    public function __call($method, $params)
    {
        $response = Http::withHeaders([
            'x-api-key' => $this->api_key,
            'Content-Type' => 'application/json'
        ])->post($this->url, [
            "jsonrpc" => "2.0",
            "method" => $method,
            "params" => [],
            "id" => "getblock.io"
        ]);

        return $response->json();
    }
}