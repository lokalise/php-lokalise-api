<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

/**
 * Class Teams
 * @package Lokalise\Endpoints]
 * @link https://lokalise.co/api2docs/php/#resource-teams
 */
class Teams extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-teams-get
     *
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function list($queryParams = [])
    {
        return $this->request(
            'GET',
            "teams",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-teams-get
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function fetchAll()
    {
        return $this->requestAll(
            'GET',
            "teams",
            [],
            [],
            'teams'
        );
    }
}
