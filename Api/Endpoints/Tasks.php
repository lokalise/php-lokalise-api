<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Tasks
 * @package Lokalise\Endpoints
 * @link https://lokalise.com/api2docs/curl/#object-tasks
 */
class Tasks extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-list-all-tasks-get
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
            "projects/$projectId/tasks",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-list-all-tasks-get
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
            "projects/$projectId/tasks",
            $queryParams,
            [],
            'tasks'
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-create-a-task-post
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
            "projects/$projectId/tasks",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-retrieve-a-task-get
     *
     * @param string $projectId
     * @param int $taskId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($projectId, $taskId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/tasks/$taskId"
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-update-a-task-put
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
    public function update($projectId, $taskId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/tasks/$taskId",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.com/api2docs/curl/#transition-delete-a-task-delete
     *
     * @param string $projectId
     * @param int $taskId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete($projectId, $taskId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/tasks/$taskId"
        );
    }
}
