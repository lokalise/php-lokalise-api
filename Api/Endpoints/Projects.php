<?php

namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

/**
 * Class Projects
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#object-projects
 */
class Projects extends Endpoint
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
    public function list(array $queryParams = []): LokaliseApiResponse
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
    public function fetchAll(array $queryParams = []): LokaliseApiResponse
    {
        return $this->requestAllUsingPaging(
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
    public function create(array $body): LokaliseApiResponse
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
    public function retrieve(string $projectId): LokaliseApiResponse
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
    public function update(string $projectId, array $body): LokaliseApiResponse
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
    public function empty(string $projectId): LokaliseApiResponse
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
    public function delete(string $projectId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId"
        );
    }
}
