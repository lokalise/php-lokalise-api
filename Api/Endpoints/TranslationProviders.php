<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Providers
 * @package Lokalise\Endpoints]
 * @link https://app.lokalise.com/api2docs/curl/#resource-providers
 */
class TranslationProviders extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-providers-get
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
            "teams/{$teamId}/translation_providers",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-providers-get
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
        return $this->requestAll(
            'GET',
            "teams/{$teamId}/translation_providers",
            [],
            [],
            'translation_providers'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-provider-get
     *
     * @param int $teamId
     * @param int $providerId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(int $teamId, int $providerId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "teams/{$teamId}/translation_providers/$providerId"
        );
    }
}
