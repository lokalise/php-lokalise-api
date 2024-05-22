<?php

namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

/**
 * Class Comments
 * @package Lokalise\Endpoints]
 * @link https://app.lokalise.com/api2docs/curl/#resource-comments
 */
class Comments extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-project-comments-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function listProject(string $projectId, array $queryParams = []): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/comments",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-project-comments-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAllProject(string $projectId): LokaliseApiResponse
    {
        return $this->requestAllUsingPaging(
            'GET',
            "projects/$projectId/comments",
            [],
            [],
            'comments'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-key-comments-get
     *
     * @param string $projectId
     * @param int $keyId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function listKey(string $projectId, int $keyId, array $queryParams = []): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/keys/$keyId/comments",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-key-comments-get
     *
     * @param string $projectId
     * @param int $keyId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAllKey(string $projectId, int $keyId): LokaliseApiResponse
    {
        return $this->requestAllUsingPaging(
            'GET',
            "projects/$projectId/keys/$keyId/comments",
            [],
            [],
            'comments'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-comments-post
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
    public function create(string $projectId, int $keyId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "projects/$projectId/keys/$keyId/comments",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-comment-get
     *
     * @param string $projectId
     * @param int $keyId
     * @param int $commentId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(string $projectId, int $keyId, int $commentId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/keys/$keyId/comments/$commentId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-comment-delete
     *
     * @param string $projectId
     * @param int $keyId
     * @param int $commentId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(string $projectId, int $keyId, int $commentId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/keys/$keyId/comments/$commentId"
        );
    }
}
