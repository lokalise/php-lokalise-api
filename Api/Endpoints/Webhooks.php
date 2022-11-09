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
class Webhooks extends Endpoint
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
    public function list(string $projectId, array $queryParams = []): LokaliseApiResponse
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
    public function fetchAll(string $projectId, array $queryParams = []): LokaliseApiResponse
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
    public function create(string $projectId, array $body): LokaliseApiResponse
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
     * @param string $webhookId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(string $projectId, string $webhookId): LokaliseApiResponse
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
     * @param string $webhookId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update(string $projectId, string $webhookId, array $body): LokaliseApiResponse
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
     * @param string $webhookId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(string $projectId, string $webhookId): LokaliseApiResponse
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
     * @param string $webhookId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function regenerateSecret(string $projectId, string $webhookId): LokaliseApiResponse
    {
        return $this->request(
            'PATCH',
            "projects/$projectId/webhooks/$webhookId/secret/regenerate"
        );
    }
}
