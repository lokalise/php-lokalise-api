<?php

namespace Lokalise;

use Lokalise\Endpoints\Comments;
use Lokalise\Endpoints\Contributors;

class LokaliseApiClient
{

    const VERSION = '0.0.1';

    // const ENDPOINT = 'https://api.lokalise.co/api2/';
    const ENDPOINT = 'http://80797367.ngrok.io/api2/';

    /** @var Comments */
    public $comments;

    /** @var Contributors */
    public $contributors;

    /**
     * LokaliseApiClient constructor.
     *
     * @param string $apiToken
     */
    public function __construct($apiToken)
    {
        $this->comments = new Comments(self::ENDPOINT, $apiToken);
        $this->contributors = new Contributors(self::ENDPOINT, $apiToken);
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }
}
