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
class TranslationProviders extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-providers-get
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
            "teams/{$teamId}/translation_providers",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-providers-get
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
            "teams/{$teamId}/translation_providers",
            [],
            [],
            'translation_providers'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-provider-get
     *
     * @param int $teamId
     * @param int $providerId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($teamId, $providerId)
    {
        return $this->request(
            'GET',
            "teams/{$teamId}/translation_providers/$providerId"
        );
    }
}
