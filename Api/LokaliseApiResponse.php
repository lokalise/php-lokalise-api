<?php

namespace Lokalise;

use \Psr\Http\Message\ResponseInterface;

class LokaliseApiResponse
{

    const HEADER_PAGINATION_COUNT = "X-Pagination-Total-Count";
    const HEADER_PAGINATION_PAGES = "X-Pagination-Page-Count";
    const HEADER_PAGINATION_LIMIT = "X-Pagination-Limit";
    const HEADER_PAGINATION_PAGE = "X-Pagination-Page";

    /** @var array */
    public $headers;

    /** @var array */
    public $body;

    /**
     * LokaliseApiResponse constructor.
     *
     * @param ResponseInterface $guzzleResponse
     */
    public function __construct(ResponseInterface $guzzleResponse)
    {
        $headers = [
            self::HEADER_PAGINATION_COUNT,
            self::HEADER_PAGINATION_PAGES,
            self::HEADER_PAGINATION_LIMIT,
            self::HEADER_PAGINATION_PAGE,
        ];

        foreach ($headers as $header) {
            $this->headers[$header] = (int)$guzzleResponse->getHeaderLine($header);
        }

        try {
            $this->body = json_decode($guzzleResponse->getBody(), true);
        } catch (\Throwable $e) {
            $this->body = [];
        }
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->body;
    }

    /**
     * Returns body content of the response
     * @return array
     */
    public function __toArray()
    {
        return $this->getContent();
    }

    /**
     * Return body content of the response encoded to JSON string
     * @return false|string
     */
    public function __toString()
    {
        return json_encode($this->getContent());
    }

    /**
     * @return int|null
     */
    public function getTotalCount()
    {
        return $this->getPaginationHeader(self::HEADER_PAGINATION_COUNT);
    }

    /**
     * @return int|null
     */
    public function getPageCount()
    {
        return $this->getPaginationHeader(self::HEADER_PAGINATION_PAGES);
    }

    /**
     * @return int|null
     */
    public function getPaginationLimit()
    {
        return $this->getPaginationHeader(self::HEADER_PAGINATION_LIMIT);
    }

    /**
     * @return int|null
     */
    public function getPaginationPage()
    {
        return $this->getPaginationHeader(self::HEADER_PAGINATION_PAGE);
    }

    /**
     * @param string $header
     *
     * @return int|null
     */
    private function getPaginationHeader($header)
    {
        return isset($this->headers[$header]) ? (int)$this->headers[$header] : null;
    }
}
