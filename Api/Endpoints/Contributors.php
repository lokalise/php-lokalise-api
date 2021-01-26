<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Contributors
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#resource-contributors
 */
class Contributors extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-contributors-get
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
            "projects/$projectId/contributors",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-contributors-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll(string $projectId): LokaliseApiResponse
    {
        return $this->requestAll(
            'GET',
            "projects/$projectId/contributors",
            [],
            [],
            'contributors'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-contributors-post
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
            "projects/$projectId/contributors",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-contributor-get
     *
     * @param string $projectId
     * @param int $contributorId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(string $projectId, int $contributorId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/contributors/$contributorId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-contributor-put
     *
     * @param string $projectId
     * @param int $contributorId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update(string $projectId, int $contributorId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "projects/$projectId/contributors/$contributorId",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-contributor-delete
     *
     * @param string $projectId
     * @param int $contributorId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(string $projectId, int $contributorId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/contributors/$contributorId"
        );
    }
}
