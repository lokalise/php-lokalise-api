<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Webhooks
 * @package Lokalise\Endpoints
 * @link https://lokalise.co/api2docs/php/#resource-webhooks
 */
class Webhooks extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-webhooks-get
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
            "projects/$projectId/webhooks",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-webhooks-get
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
            "projects/$projectId/webhooks",
            $queryParams,
            [],
            'webhooks'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-create-webhooks-post
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
            "projects/$projectId/webhooks",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-webhooks-get
     *
     * @param string $projectId
     * @param int $webhookId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($projectId, $webhookId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/webhooks/$webhookId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-update-a-webhooks-put
     *
     * @param string $projectId
     * @param int $webhookId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update($projectId, $webhookId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/webhooks/$webhookId",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-bulk-update-put
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function bulkUpdate($projectId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/webhooks",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-a-webhooks-delete
     *
     * @param string $projectId
     * @param int $webhookId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete($projectId, $webhookId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/webhooks/$webhookId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-multiple-webhooks-delete
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function bulkDelete($projectId, $body)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/webhooks",
            [],
            $body
        );
    }
}
