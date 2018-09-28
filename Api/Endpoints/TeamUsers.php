<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

/**
 * Class TeamUsers
 * @package Lokalise\Endpoints]
 * @link https://lokalise.co/api2docs/php/#resource-team-users
 */
class TeamUsers extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-team-users-get
     *
     * @param int $teamId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function list($teamId, $queryParams = [])
    {
        return $this->request(
            'GET',
            "teams/$teamId/users",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-team-users-get
     *
     * @param int $teamId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function fetchAll($teamId)
    {
        return $this->requestAll(
            'GET',
            "teams/$teamId/users",
            [],
            [],
            'team_users'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-team-user-get
     *
     * @param int $teamId
     * @param int $userId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function retrieve($teamId, $userId)
    {
        return $this->request(
            'GET',
            "teams/$teamId/users/$userId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-update-a-team-user-put
     *
     * @param int $teamId
     * @param int $userId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function update($teamId, $userId, $body)
    {
        return $this->request(
            'PUT',
            "teams/$teamId/users/$userId",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-a-team-user-delete
     *
     * @param int $teamId
     * @param int $userId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function delete($teamId, $userId)
    {
        return $this->request(
            'DELETE',
            "teams/$teamId/users/$userId"
        );
    }
}
