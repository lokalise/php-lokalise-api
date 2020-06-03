<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Webhooks
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#resource-webhooks
 */
class Webhooks extends Endpoint implements EndpointInterface
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-webhooks-get
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-webhooks-get
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-a-webhook-post
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-webhook-get
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-webhook-put
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-webhook-delete
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-regenerate-a-webhook-secret-patch
     *
     * @param string $projectId
     * @param int $webhookId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function regenerate($projectId, $webhookId)
    {
        return $this->request(
            'PATCH',
            "projects/$projectId/webhooks/$webhookId/secret/regenerate"
        );
    }
}
