<?php

namespace Lokalise\Endpoints;

use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

/**
 * Class PermissionTemplates
 * @package Lokalise\Endpoints]
 * @link https://app.lokalise.com/api2docs/curl/#resource-permission-templates
 */
class PermissionTemplates extends Endpoint
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-permission-templates-get
     *
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list(int $teamId): LokaliseApiResponse
    {
        return $this->request(
            'GET',
            "teams/$teamId/roles",
            []
        );
    }
}
