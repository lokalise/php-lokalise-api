<?php

namespace Lokalise;

use Lokalise\Endpoints\Comments;

class LokaliseApiClient
{

    const VERSION = '0.0.1';

    const ENDPOINT = 'https://api.lokalise.co/api2/';

    /** @var Comments */
    public $comments;

    /**
     * LokaliseApiClient constructor.
     *
     * @param string $apiToken
     */
    public function __construct($apiToken)
    {
        $this->comments = new Comments(self::ENDPOINT, $apiToken);
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }
}
