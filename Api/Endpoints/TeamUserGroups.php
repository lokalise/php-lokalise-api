<?php

namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

/**
 * Class TeamUserGroups
 * @package Lokalise\Endpoints]
 * @link https://app.lokalise.com/api2docs/curl/#resource-team-user-groups
 */
class TeamUserGroups extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-groups-get
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
            "teams/$teamId/groups",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-team-groups-get
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
        return $this->requestAllUsingPaging(
            'GET',
            "teams/$teamId/groups",
            [],
            [],
            'user_groups'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-group-get
     *
     * @param int $teamId
     * @param int $groupId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(int $teamId, int $groupId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "teams/$teamId/groups/$groupId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-group-put
     *
     * @param int $teamId
     * @param int $groupId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update(int $teamId, int $groupId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "teams/$teamId/groups/$groupId",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-a-group-post
     *
     * @param int $teamId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create(int $teamId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "teams/$teamId/groups",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-group-delete
     *
     * @param int $teamId
     * @param int $groupId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(int $teamId, int $groupId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "teams/$teamId/groups/$groupId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-add-projects-to-group-put
     *
     * @param int $teamId
     * @param int $groupId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function addProjects(int $teamId, int $groupId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "teams/$teamId/groups/$groupId/projects/add",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-remove-projects-from-group-put
     *
     * @param int $teamId
     * @param int $groupId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function removeProjects(int $teamId, int $groupId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "teams/$teamId/groups/$groupId/projects/remove",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-add-members-to-group-put
     *
     * @param int $teamId
     * @param int $groupId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function addMembers(int $teamId, int $groupId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "teams/$teamId/groups/$groupId/members/add",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-remove-members-from-group-put
     *
     * @param int $teamId
     * @param int $groupId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function removeMembers(int $teamId, int $groupId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "teams/$teamId/groups/$groupId/members/remove",
            [],
            $body
        );
    }
}
