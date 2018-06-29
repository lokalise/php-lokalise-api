<?php

namespace Lokalise;

use Psr\Http\Message\ResponseInterface;

class LokaliseApiResponse
{

    const HEADER_PAGINATION_COUNT = "X-Pagination-Total-Count";
    const HEADER_PAGINATION_PAGES = "X-Pagination-Page-Count";
    const HEADER_PAGINATION_LIMIT = "X-Pagination-Limit";
    const HEADER_PAGINATION_OFFSET = "X-Pagination-Offset";

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
            self::HEADER_PAGINATION_OFFSET,
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
    public function getPaginationOffset()
    {
        return $this->getPaginationHeader(self::HEADER_PAGINATION_OFFSET);
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
