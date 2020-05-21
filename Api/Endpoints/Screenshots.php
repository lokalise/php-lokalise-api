<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Screenshots
 * @package Lokalise\Endpoints]
 * @link https://lokalise.com/api2docs/curl/#resource-screenshots
 */
class Screenshots extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-list-all-screenshots-get
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
            "projects/$projectId/screenshots",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-list-all-screenshots-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll($projectId)
    {
        return $this->requestAll(
            'GET',
            "projects/$projectId/screenshots",
            [],
            [],
            'screenshots'
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-create-screenshots-post
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
            "projects/$projectId/screenshots",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-retrieve-a-screenshot-get
     *
     * @param string $projectId
     * @param int $screenshotId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($projectId, $screenshotId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/screenshots/$screenshotId"
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-update-a-screenshot-put
     *
     * @param string $projectId
     * @param int $screenshotId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update($projectId, $screenshotId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/screenshots/$screenshotId",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-delete-a-screenshot-delete
     *
     * @param string $projectId
     * @param int $screenshotId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete($projectId, $screenshotId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/screenshots/$screenshotId"
        );
    }
}
