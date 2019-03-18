<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Orders
 * @package Lokalise\Endpoints]
 * @link https://lokalise.co/api2docs/php/#resource-team-user-groups
 */
class Orders extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-orders-get
     *
     * @param int $teamId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list($teamId, $queryParams = [])
    {
        return $this->request(
            'GET',
            "teams/{$teamId}/orders",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-orders-get
     *
     * @param int $teamId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll($teamId)
    {
        return $this->requestAll(
            'GET',
            "teams/{$teamId}/orders",
            [],
            [],
            'orders'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-an-order-get
     *
     * @param int $teamId
     * @param string $orderId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($teamId, $orderId)
    {
        return $this->request(
            'GET',
            "teams/{$teamId}/orders/{$orderId}"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-create-an-order-post
     *
     * @param int $teamId
     *
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create($teamId, $body)
    {
        return $this->request(
            'POST',
            "teams/{$teamId}/orders",
            [],
            $body
        );
    }
}
