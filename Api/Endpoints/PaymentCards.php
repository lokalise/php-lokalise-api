<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Cards
 * @package Lokalise\Endpoints]
 * @link https://app.lokalise.com/api2docs/curl/#resource-team-user-groups
 */
class PaymentCards extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-cards-get
     *
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list(array $queryParams = []): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "payment_cards",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-cards-get
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll(): LokaliseApiResponse
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-card-get
     *
     * @param int $cardId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(int $cardId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "payment_cards/$cardId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-a-card-post
     *
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create(array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "payment_cards",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-card-delete
     *
     * @param int $cardId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(int $cardId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "payment_cards/$cardId"
        );
    }
}
