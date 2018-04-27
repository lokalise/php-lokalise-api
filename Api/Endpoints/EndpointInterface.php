<?php

namespace Lokalise\Endpoints;

interface EndpointInterface
{

    public function __construct($baseUrl, $apiToken);
}
