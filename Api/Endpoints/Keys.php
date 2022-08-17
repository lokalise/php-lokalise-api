<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Keys
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#resource-keys
 */
class Keys extends Endpoint
{
    public const FETCH_ALL_LIMIT = 500;

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-keys-get
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
            "projects/$projectId/keys",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-keys-get
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
            "projects/$projectId/keys",
            $queryParams,
            [],
            'keys'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-keys-post
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
            "projects/$projectId/keys",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-key-get
     *
     * @param string $projectId
     * @param int $keyId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(string $projectId, int $keyId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/keys/$keyId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-key-put
     *
     * @param string $projectId
     * @param int $keyId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update(string $projectId, int $keyId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "projects/$projectId/keys/$keyId",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-bulk-update-put
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function bulkUpdate(string $projectId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "projects/$projectId/keys",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-key-delete
     *
     * @param string $projectId
     * @param int $keyId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(string $projectId, int $keyId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/keys/$keyId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-multiple-keys-delete
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function bulkDelete(string $projectId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/keys",
            [],
            $body
        );
    }
}
