<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Comments
 * @package Lokalise\Endpoints]
 * @link https://app.lokalise.com/api2docs/curl/#resource-comments
 */
class Comments extends Endpoint implements EndpointInterface
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
    public function listProject($projectId, $queryParams = [])
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
    public function fetchAllProject($projectId)
    {
        return $this->requestAll(
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
    public function listKey($projectId, $keyId, $queryParams = [])
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
    public function fetchAllKey($projectId, $keyId)
    {
        return $this->requestAll(
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
    public function create($projectId, $keyId, $body)
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
    public function retrieve($projectId, $keyId, $commentId)
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
    public function delete($projectId, $keyId, $commentId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/keys/$keyId/comments/$commentId"
        );
    }
}
