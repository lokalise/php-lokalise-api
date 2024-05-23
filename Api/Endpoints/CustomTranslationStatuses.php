<?php

namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

/**
 * Class CustomTranslationStatuses
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#object-custom-translation-statuses
 */
class CustomTranslationStatuses extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-custom-translation-statuses-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list(string $projectId, array $queryParams = []): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/custom-translation-statuses",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-custom-translation-statuses-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll(string $projectId, array $queryParams = []): LokaliseApiResponse
    {
        return $this->requestAllUsingPaging(
            'GET',
            "projects/$projectId/custom-translation-statuses",
            $queryParams,
            [],
            'custom_translation_statuses'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-a-custom-translation-status-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create(string $projectId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "projects/$projectId/custom-translation-statuses",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-custom-translation-status-get
     *
     * @param string $projectId
     * @param int $statusId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(string $projectId, int $statusId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/custom-translation-statuses/$statusId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-custom-translation-status-put
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
    public function update(string $projectId, int $statusId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "projects/$projectId/custom-translation-statuses/$statusId",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-custom-translation-status-delete
     *
     * @param string $projectId
     * @param int $statusId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(string $projectId, int $statusId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/custom-translation-statuses/$statusId"
        );
    }
}
