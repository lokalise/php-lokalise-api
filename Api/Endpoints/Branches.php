<?php

declare(strict_types=1);


namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

/**
 * @link https://app.lokalise.com/api2docs/curl/#object-branches
 */
class Branches extends Endpoint
{
    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-branches-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function listBranches(string $projectId, array $queryParams = []): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/branches",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-branch-get
     *
     * @param string $projectId
     * @param int $branchId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(string $projectId, int $branchId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/branches/$branchId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-a-branch-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create(string $projectId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "projects/$projectId/branches",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-branch-put
     *
     * @param string $projectId
     * @param int $branchId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update(string $projectId, int $branchId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "projects/$projectId/branches/$branchId",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-branch-delete
     *
     * @param string $projectId
     * @param int $branchId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(string $projectId, int $branchId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/branches/$branchId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-merge-a-branch-post
     *
     * @param string $projectId
     * @param int $branchId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function merge(string $projectId, int $branchId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "projects/$projectId/branches/$branchId/merge",
            [],
            $body
        );
    }
}
