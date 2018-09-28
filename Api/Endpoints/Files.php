<?php

namespace Lokalise\Endpoints;

use Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;

/**
 * Class Files
 * @package Lokalise\Endpoints
 * @link https://lokalise.co/api2docs/php/#resource-files
 */
class Files extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-files-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function list($projectId, $queryParams = [])
    {
        return $this->request(
            'GET',
            "projects/$projectId/files",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-all-files-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function fetchAll($projectId)
    {
        return $this->requestAll(
            'GET',
            "projects/$projectId/files",
            [],
            [],
            'files'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-upload-a-file-post
     *
     * @param string $projectId
     * @param array $body
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function upload($projectId, $body)
    {
        return $this->request(
            'POST',
            "projects/$projectId/files/upload",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-download-files-post
     *
     * @param string $projectId
     * @param array $body
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    public function download($projectId, $body)
    {
        return $this->request(
            'POST',
            "projects/$projectId/files/download",
            [],
            $body
        );
    }
}
