<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

/**
 * Class Comments
 * @package Lokalise\Endpoints]
 * @link https://lokalise.co/api2docs/php/#resource-comments
 */
class Comments extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-project-comments-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
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
     * @link https://lokalise.co/api2docs/php/#transition-list-project-comments-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
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
     * @link https://lokalise.co/api2docs/php/#transition-list-key-comments-get
     *
     * @param string $projectId
     * @param int $keyId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
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
     * @link https://lokalise.co/api2docs/php/#transition-list-key-comments-get
     *
     * @param string $projectId
     * @param int $keyId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
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
     * @link https://lokalise.co/api2docs/php/#transition-create-comments-post
     *
     * @param string $projectId
     * @param int $keyId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
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
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-comment-get
     *
     * @param string $projectId
     * @param int $keyId
     * @param int $commentId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function retrieve($projectId, $keyId, $commentId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/keys/$keyId/comments/$commentId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-a-comment-delete
     *
     * @param string $projectId
     * @param int $keyId
     * @param int $commentId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function delete($projectId, $keyId, $commentId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/keys/$keyId/comments/$commentId"
        );
    }
}
