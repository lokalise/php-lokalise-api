<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class CustomTranslationStatuses
 * @package Lokalise\Endpoints
 * @link https://lokalise.com/api2docs/curl/#object-custom-translation-statuses
 */
class CustomTranslationStatuses extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-list-all-custom-translation-statuses-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list($projectId, $queryParams = [])
    {
        return $this->request(
            'GET',
            "projects/$projectId/custom-translation-statuses",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-list-all-custom-translation-statuses-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll($projectId, $queryParams = [])
    {
        return $this->requestAll(
            'GET',
            "projects/$projectId/custom-translation-statuses",
            $queryParams,
            [],
            'custom_translation_statuses'
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-create-a-custom-translation-status-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create($projectId, $body)
    {
        return $this->request(
            'POST',
            "projects/$projectId/custom-translation-statuses",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-retrieve-a-custom-translation-status-get
     *
     * @param string $projectId
     * @param int $statusId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($projectId, $statusId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/custom-translation-statuses/$statusId"
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-update-a-custom-translation-status-put
     *
     * @param string $projectId
     * @param int $statusId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update($projectId, $statusId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/custom-translation-statuses/$statusId",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-delete-a-custom-translation-status-delete
     *
     * @param string $projectId
     * @param int $statusId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete($projectId, $statusId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/custom-translation-statuses/$statusId"
        );
    }
}
