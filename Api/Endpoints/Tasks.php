<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

/**
 * Class Tasks
 * @package Lokalise\Endpoints
 * @link https://lokalise.co/api2docs/php/#object-tasks
 */
class Tasks extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-tasks-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
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
     * @link https://lokalise.co/api2docs/php/#transition-list-all-tasks-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function fetchAll($projectId)
    {
        return $this->requestAll(
            'GET',
            "projects/$projectId/tasks",
            [],
            [],
            'tasks'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-create-a-task-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
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
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-task-get
     *
     * @param string $projectId
     * @param int $taskId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function retrieve($projectId, $taskId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/tasks/$taskId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-update-a-task-put
     *
     * @param string $projectId
     * @param int $taskId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
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
     * @link https://lokalise.co/api2docs/php/#transition-delete-a-task-delete
     *
     * @param string $projectId
     * @param int $taskId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function delete($projectId, $taskId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/tasks/$taskId"
        );
    }
}
