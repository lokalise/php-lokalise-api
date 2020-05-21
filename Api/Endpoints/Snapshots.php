<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Snapshots
 * @package Lokalise\Endpoints]
 * @link https://app.lokalise.com/api2docs/curl/#resource-snapshots
 */
class Snapshots extends Endpoint implements EndpointInterface
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-snapshots-get
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
            "projects/$projectId/snapshots",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-snapshots-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll($projectId)
    {
        return $this->requestAll(
            'GET',
            "projects/$projectId/snapshots",
            [],
            [],
            'snapshots'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-a-snapshot-post
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
            "projects/$projectId/snapshots",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-restore-a-snapshot-post
     *
     * @param string $projectId
     * @param int $snapshotId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function restore($projectId, $snapshotId)
    {
        return $this->request(
            'POST',
            "projects/$projectId/snapshots/$snapshotId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-snapshot-delete
     *
     * @param string $projectId
     * @param int $snapshotId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete($projectId, $snapshotId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/snapshots/$snapshotId"
        );
    }
}
