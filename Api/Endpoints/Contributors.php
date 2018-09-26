<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

class Contributors extends Endpoint implements EndpointInterface
{

    /**
     * @param string $projectId
     * @param array $params
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function list($projectId, $params = [])
    {
        return $this->request(
            'GET',
            "projects/$projectId/contributors",
            $params
        );
    }

    /**
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
            "projects/$projectId/contributors",
            [],
            $body
        );
    }

    /**
     * @param string $projectId
     * @param int $contributorId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function retrieve($projectId, $contributorId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/contributors/$contributorId"
        );
    }

    /**
     * @param string $projectId
     * @param int $contributorId
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function update($projectId, $contributorId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/contributors/$contributorId",
            [],
            $body
        );
    }

    /**
     * @param string $projectId
     * @param integer $contributorId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function delete($projectId, $contributorId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/contributors/$contributorId"
        );
    }

}
