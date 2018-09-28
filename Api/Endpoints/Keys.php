<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

/**
 * Class Keys
 * @package Lokalise\Endpoints
 * @link https://lokalise.co/api2docs/php/#resource-keys
 */
class Keys extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-keys-get
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
            "projects/$projectId/keys",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-keys-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function fetchAll($projectId, $queryParams = [])
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
     * @link https://lokalise.co/api2docs/php/#transition-create-keys-post
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
            "projects/$projectId/keys",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-key-get
     *
     * @param string $projectId
     * @param int $keyId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function retrieve($projectId, $keyId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/keys/$keyId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-update-a-key-put
     *
     * @param string $projectId
     * @param int $keyId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function update($projectId, $keyId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/keys/$keyId",
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
     * @throws LokaliseApiException
     */
    public function bulkUpdate($projectId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/keys",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-a-key-delete
     *
     * @param string $projectId
     * @param int $keyId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function delete($projectId, $keyId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/keys/$keyId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-multiple-keys-delete
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function bulkDelete($projectId, $body)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/keys",
            [],
            $body
        );
    }
}
