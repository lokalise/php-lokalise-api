<?php

namespace Lokalise\Endpoints;

interface EndpointInterface
{

    public function __construct(string $baseUrl, ?string $apiToken);
}
