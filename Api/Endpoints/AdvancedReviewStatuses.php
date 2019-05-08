<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class AdvancedReviewStatuses
 * @package Lokalise\Endpoints
 * @link https://lokalise.co/api2docs/php/#object-advanced-review-statuses
 */
class AdvancedReviewStatuses extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-advanced-review-statuses-get
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
            "projects/$projectId/advanced-review-statuses",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-advanced-review-statuses-get
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
            "projects/$projectId/advanced-review-statuses",
            $queryParams,
            [],
            'advanced_review_statuses'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-create-an-advanced-review-status-post
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
            "projects/$projectId/advanced-review-statuses",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-an-advanced-review-status-get
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
            "projects/$projectId/advanced-review-statuses/$statusId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-update-an-advanced-review-status-put
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
            "projects/$projectId/advanced-review-statuses/$statusId",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-an-advanced-review-status-delete
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
            "projects/$projectId/advanced-review-statuses/$statusId"
        );
    }
}
