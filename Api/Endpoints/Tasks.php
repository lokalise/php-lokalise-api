<?php

namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

/**
 * Class Tasks
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#object-tasks
 */
class Tasks extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-tasks-get
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
            "projects/$projectId/tasks",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-tasks-get
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
            "projects/$projectId/tasks",
            $queryParams,
            [],
            'tasks'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-a-task-post
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
            "projects/$projectId/tasks",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-task-get
     *
     * @param string $projectId
     * @param int $taskId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(string $projectId, int $taskId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/tasks/$taskId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-task-put
     *
     * @param string $projectId
     * @param int $taskId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update(string $projectId, int $taskId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "projects/$projectId/tasks/$taskId",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-task-delete
     *
     * @param string $projectId
     * @param int $taskId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(string $projectId, int $taskId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/tasks/$taskId"
        );
    }
}
