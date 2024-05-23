<?php

namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

/**
 * Class Orders
 * @package Lokalise\Endpoints]
 * @link https://app.lokalise.com/api2docs/curl/#resource-team-user-groups
 */
class Orders extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-orders-get
     *
     * @param int $teamId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list(int $teamId, array $queryParams = []): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "teams/{$teamId}/orders",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-orders-get
     *
     * @param int $teamId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll(int $teamId): LokaliseApiResponse
    {
        return $this->requestAllUsingPaging(
            'GET',
            "teams/{$teamId}/orders",
            [],
            [],
            'orders'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-an-order-get
     *
     * @param int $teamId
     * @param string $orderId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(int $teamId, string $orderId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "teams/{$teamId}/orders/{$orderId}"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-an-order-post
     *
     * @param int $teamId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create(int $teamId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "teams/{$teamId}/orders",
            [],
            $body
        );
    }
}
