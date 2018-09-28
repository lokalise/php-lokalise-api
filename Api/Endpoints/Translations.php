<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

/**
 * Class Translations
 * @package Lokalise\Endpoints]
 * @link https://lokalise.co/api2docs/php/#resource-translations
 */
class Translations extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-translations-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function list($projectId, $queryParams = [])
    {
        return $this->request(
            'GET',
            "projects/$projectId/translations",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-translations-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function fetchAll($projectId, $queryParams = [])
    {
        return $this->requestAll(
            'GET',
            "projects/$projectId/translations",
            $queryParams,
            [],
            'translations'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-translation-get
     *
     * @param string $projectId
     * @param int $translationId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function retrieve($projectId, $translationId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/translations/$translationId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-update-a-translation-put
     *
     * @param string $projectId
     * @param int $translationId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function update($projectId, $translationId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/translations/$translationId",
            [],
            $body
        );
    }
}
