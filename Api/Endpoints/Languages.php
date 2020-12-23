<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Languages
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#resource-languages
 */
class Languages extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-system-languages-get
     *
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function listSystem(array $queryParams = []): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "system/languages",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-system-languages-get
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAllSystem(): LokaliseApiResponse
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
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-project-languages-get
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
            "projects/$projectId/languages",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-project-languages-get
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
        return $this->requestAll(
            'GET',
            "projects/$projectId/languages",
            [],
            [],
            'languages'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-create-languages-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function create(string $projectId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'POST',
            "projects/$projectId/languages",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-language-get
     *
     * @param string $projectId
     * @param int $languageId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function retrieve(string $projectId, int $languageId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "projects/$projectId/languages/$languageId"
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-update-a-language-put
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
    public function update(string $projectId, int $languageId, array $body): LokaliseApiResponse
    {
        return $this->request(
            'PUT',
            "projects/$projectId/languages/$languageId",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-delete-a-language-delete
     *
     * @param string $projectId
     * @param int $languageId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function delete(string $projectId, int $languageId): LokaliseApiResponse
    {
        return $this->request(
            'DELETE',
            "projects/$projectId/languages/$languageId"
        );
    }
}
