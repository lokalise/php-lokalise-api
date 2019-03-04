<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Providers
 * @package Lokalise\Endpoints]
 * @link https://lokalise.co/api2docs/php/#resource-providers
 */
class Providers extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-providers-get
     *
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list($queryParams = [])
    {
        return $this->request(
            'GET',
            "providers",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-providers-get
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll()
    {
        return $this->requestAll(
            'GET',
            "providers",
            [],
            [],
            'providers'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-provider-get
     *
     * @param int $providerId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($providerId)
    {
        return $this->request(
            'GET',
            "providers/$providerId"
        );
    }
}
