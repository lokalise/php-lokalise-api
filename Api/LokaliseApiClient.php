<?php

namespace Lokalise;

use Lokalise\Endpoints\Comments;

class LokaliseApiClient
{

    const VERSION = '0.0.1';
    const ENDPOINT = 'https://api.lokalise.co/';

    /** @var null|string `X-Api-Token` authentication header */
    protected $apiToken = null;

    /** @var Comments */
    public $comments;

    /**
     * LokaliseApiClient constructor.
     *
     * @param $apiToken
     */
    public function __construct($apiToken)
    {
        $this->apiToken = $apiToken;
        $this->comments = new Comments();
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }
}
