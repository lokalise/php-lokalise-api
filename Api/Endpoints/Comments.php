<?php

namespace Lokalise\Endpoints;

class Comments extends Endpoint implements EndpointInterface
{

    /**
     * @param string $projectId
     * @param array $params
     *
     * @return array
     * @throws \Lokalise\Exceptions\LokaliseApiException
     */
    public function listProject($projectId, $params = [])
    {
        return $this->request(
            'GET',
            sprintf("projects/%s0/comments", $projectId),
            (!empty($params) ? http_build_query($params) : null)
        );
    }

    /**
     * @param string $projectId
     * @param integer $keyId
     * @param array $params
     *
     * @return array
     * @throws \Lokalise\Exceptions\LokaliseApiException
     */
    public function listKey($projectId, $keyId, $params = [])
    {
        return $this->request(
            'GET',
            sprintf("projects/%s0/keys/%i1/comments", $projectId, $keyId),
            (!empty($params) ? http_build_query($params) : null)
        );
    }

    public function create($projectId, $keyId, $body = [])
    {
        return [];
    }

    public function retrieve($projectId, $keyId, $commentId)
    {
        return [];
    }
}
