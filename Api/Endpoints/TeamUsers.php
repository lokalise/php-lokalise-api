<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class TeamUsers
 * @package Lokalise\Endpoints]
 * @link https://app.lokalise.com/api2docs/curl/#resource-team-users
 */
class TeamUsers extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-team-users-get
     *
     * @param int $teamId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list(int $teamId, array $queryParams = []): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "teams/$teamId/users",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-team-users-get
     *
     * @param int $teamId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll(int $teamId): LokaliseApiResponse
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-team-user-get
     *
     * @param int $teamId
     * @param int $userId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(int $teamId, int $userId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "teams/$teamId/users/$userId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-team-user-put
     *
     * @param int $teamId
     * @param int $userId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update(int $teamId, int $userId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "teams/$teamId/users/$userId",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-team-user-delete
     *
     * @param int $teamId
     * @param int $userId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(int $teamId, int $userId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "teams/$teamId/users/$userId"
        );
    }
}
