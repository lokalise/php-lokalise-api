<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Languages
 * @package Lokalise\Endpoints
 * @link https://lokalise.co/api2docs/php/#resource-languages
 */
class Languages extends Endpoint implements EndpointInterface
{

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-system-languages-get
     *
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function listSystem($queryParams = [])
    {
        return $this->request(
            'GET',
            "system/languages",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-system-languages-get
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAllSystem()
    {
        return $this->requestAll(
            'GET',
            "system/languages",
            [],
            [],
            'languages'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-project-languages-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list($projectId, $queryParams = [])
    {
        return $this->request(
            'GET',
            "projects/$projectId/languages",
            $queryParams
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-list-project-languages-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll($projectId)
    {
        return $this->requestAll(
            'GET',
            "projects/$projectId/languages",
            [],
            [],
            'languages'
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-create-languages-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create($projectId, $body)
    {
        return $this->request(
            'POST',
            "projects/$projectId/languages",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-retrieve-a-language-get
     *
     * @param string $projectId
     * @param int $languageId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve($projectId, $languageId)
    {
        return $this->request(
            'GET',
            "projects/$projectId/languages/$languageId"
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-update-a-language-put
     *
     * @param string $projectId
     * @param int $languageId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function update($projectId, $languageId, $body)
    {
        return $this->request(
            'PUT',
            "projects/$projectId/languages/$languageId",
            [],
            $body
        );
    }

    /**
     * @link https://lokalise.co/api2docs/php/#transition-delete-a-language-delete
     *
     * @param string $projectId
     * @param int $languageId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete($projectId, $languageId)
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/languages/$languageId"
        );
    }
}
