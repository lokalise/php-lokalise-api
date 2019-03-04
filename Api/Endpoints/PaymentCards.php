<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Cards
 * @package Lokalise\Endpoints]
 * @link https://lokalise.co/api2docs/php/#resource-team-user-groups
 */
class PaymentCards extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-cards-get
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
            "payment_cards",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-cards-get
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
            "payment_cards",
            [],
            [],
            'payment_cards'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-card-get
     *
     * @param int $cardId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($cardId)
    {
        return $this->request(
            'GET',
            "payment_cards/$cardId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-create-a-card-post
     *
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create($body)
    {
        return $this->request(
            'POST',
            "payment_cards",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-a-card-delete
     *
     * @param int $cardId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete($cardId)
    {
        return $this->request(
            'DELETE',
            "payment_cards/$cardId"
        );
    }
}
