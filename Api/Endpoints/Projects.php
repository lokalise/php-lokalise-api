<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

/**
 * Class Projects
 * @package Lokalise\Endpoints
 * @link https://lokalise.co/api2docs/php/#object-projects
 */
class Projects extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-projects-get
     *
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function list($queryParams = [])
    {
        return $this->request(
            'GET',
            "projects",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-projects-get
     *
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function fetchAll($queryParams = [])
    {
        return $this->requestAll(
            'GET',
            "projects",
            $queryParams,
            [],
            'projects'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-create-a-project-post
     *
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function create($body)
    {
        return $this->request(
            'POST',
            "projects",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-project-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function retrieve($projectId)
    {
        return $this->request(
            'GET',
            "projects/$projectId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-update-a-project-put
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function update($projectId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-empty-project-put
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function empty($projectId)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/empty"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-a-project-delete
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function delete($projectId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId"
        );
    }
}
