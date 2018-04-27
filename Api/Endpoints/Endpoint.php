<?php

namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;

class Endpoint implements EndpointInterface
{

    /** @var string $baseUrl API base URL */
    protected $baseUrl;

    /** @var null|string `X-Api-Token` authentication header */
    protected $apiToken;

    /**
     * Endpoint constructor.
     *
     * @param string $baseUrl parent::constant
     * @param string $apiToken Client provided authentication token
     */
    public function __construct($baseUrl, $apiToken)
    {
        $this->baseUrl = $baseUrl;
        $this->apiToken = $apiToken;
    }

    /**
     * @param string $requestType GET|POST|PUT|DELETE
     * @param string $uri
     * @param null|string $query
     *
     * @return array
     * @throws LokaliseApiException
     */
    public function request($requestType, $uri, $query)
    {
        $url = (!empty($query) ? "$uri?$query" : $uri);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "{$this->baseUrl}$url",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $requestType,
            CURLOPT_HTTPHEADER => [
                "X-Api-Token: {$this->apiToken}",
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            throw new LokaliseApiException($error);
        }

        return $response;
    }
}
