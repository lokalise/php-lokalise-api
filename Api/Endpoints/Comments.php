<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

class Comments extends Endpoint implements EndpointInterface
{

    /**
     * @param string $projectId
     * @param array $params
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function listProject($projectId, $params = [])
    {
        return $this->request(
            'GET',
            "projects/$projectId/comments",
            $params
        );
    }

    /**
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function fetchAllProject($projectId)
    {
        $offset = 0;
        $limit = 100;

        $result = $this->listProject($projectId, ['limit' => $limit, 'offset' => $offset]);
        while ($result->getPageCount() > $offset) {
            $offset++;
            $previousResult = clone $result;
            $result = $this->listProject($projectId, ['limit' => $limit, 'offset' => $offset]);
            if (is_array($result->body['comments']) && is_array($previousResult->body['comments'])) {
                $result->body['comments'] = array_merge($previousResult->body['comments'], $result->body['comments']);
            }
        }

        return $result;
    }

    /**
     * @param string $projectId
     * @param integer $keyId
     * @param array $params
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function listKey($projectId, $keyId, $params = [])
    {
        return $this->request(
            'GET',
            "projects/$projectId/keys/$keyId/comments",
            $params
        );
    }

    /**
     * @param string $projectId
     * @param integer $keyId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function fetchAllKey($projectId, $keyId)
    {
        $offset = 0;
        $limit = 100;

        $result = $this->listKey($projectId, $keyId, ['limit' => $limit, 'offset' => $offset]);
        while ($result->getPageCount() > $offset) {
            $offset++;
            $previousResult = clone $result;
            $result = $this->listKey($projectId, $keyId, ['limit' => $limit, 'offset' => $offset]);
            if (is_array($result->body['comments']) && is_array($previousResult->body['comments'])) {
                $result->body['comments'] = array_merge($previousResult->body['comments'], $result->body['comments']);
            }
        }

        return $result;
    }

    /**
     * @param string $projectId
     * @param integer $keyId
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
     * @param string $projectId
     * @param integer $keyId
     * @param integer $commentId
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
