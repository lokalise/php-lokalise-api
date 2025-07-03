<?php

namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

/**
 * Class Files
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#resource-files
 */
class Files extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-files-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list(string $projectId, array $queryParams = []): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/files",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-files-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll(string $projectId): LokaliseApiResponse
    {
        return $this->requestAllUsingPaging(
            'GET',
            "projects/$projectId/files",
            [],
            [],
            'files'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-upload-a-file-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function upload(string $projectId, array $body): LokaliseApiResponse
    {
        // Requests that do not use the queue=true parameter are deprecated and will be unsupported
        $body['queue'] = true;

        return $this->request(
            'POST',
            "projects/$projectId/files/upload",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-download-files-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     *
     * @note Important: Starting June 1st, 2025, this method will be limited to projects with under 10,000 key-language pairs. For larger projects, please use `asyncDownload` instead.
     */
    public function download(string $projectId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "projects/$projectId/files/download",
            [],
            $body
        );
    }
  
    /**
     * @link https://developers.lokalise.com/reference/download-files-async
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function asyncDownload(string $projectId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "projects/$projectId/files/async-download",
            [],
            $body
        );
    }

    /**
    * @link https://developers.lokalise.com/reference/delete-a-file
    *
    * @param string $projectId
    * @param int $fileId
    *
    * @return LokaliseApiResponse
    *
    * @throws LokaliseApiException
    * @throws LokaliseResponseException
    */
    public function delete(string $projectId, int $fileId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/files/$fileId"
		    );
    }
