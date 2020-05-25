<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Projects
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#object-projects
 */
class Projects extends Endpoint implements EndpointInterface
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-projects-get
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
            "projects",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-projects-get
     *
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-a-project-post
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
            "projects",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-project-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($projectId)
    {
        return $this->request(
            'GET',
            "projects/$projectId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-project-put
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-empty-a-project-put
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function empty($projectId)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/empty"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-project-delete
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete($projectId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId"
        );
    }
}
