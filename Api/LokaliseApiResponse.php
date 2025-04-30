<?php

namespace Lokalise;

use Exception;
use JsonException;
use Psr\Http\Message\ResponseInterface;

class LokaliseApiResponse
{
    public const HEADER_PAGINATION_COUNT = "X-Pagination-Total-Count";
    public const HEADER_PAGINATION_PAGES = "X-Pagination-Page-Count";
    public const HEADER_PAGINATION_LIMIT = "X-Pagination-Limit";
    public const HEADER_PAGINATION_PAGE = "X-Pagination-Page";
    public const HEADER_PAGINATION_NEXT_CURSOR = "X-Pagination-Next-Cursor";
    public const HEADER_RESPONSE_TOO_BIG = "X-Response-Too-Big";

    public array $headers;
    public ?array $body;

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
            $this->headers[$header] = $guzzleResponse->getHeaderLine($header);
        }

        $this->headers[self::HEADER_PAGINATION_NEXT_CURSOR] =
            $guzzleResponse->getHeaderLine(self::HEADER_PAGINATION_NEXT_CURSOR);

        $responseTooBig = $guzzleResponse->getHeaderLine(self::HEADER_RESPONSE_TOO_BIG);
        if (!empty($responseTooBig)) {
            $this->headers[self::HEADER_RESPONSE_TOO_BIG] = $guzzleResponse->getHeaderLine($responseTooBig);
        }

        try {
            $this->body = json_decode($guzzleResponse->getBody(), true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $e) {
            $this->body = [];
        }
    }

    /**
     * @return array
     */
    public function getContent(): ?array
    {
        return $this->body;
    }

    /**
     * Returns body content of the response
     * @return array
     */
    public function __toArray(): ?array
    {
        return $this->getContent();
    }

    /**
     * Return body content of the response encoded to JSON string
     * @return string
     * @throws JsonException
     */
    public function __toString(): string
    {
        return json_encode($this->getContent(), JSON_THROW_ON_ERROR);
    }

    /**
     * @return int|null
     */
    public function getTotalCount(): ?int
    {
        return $this->getPaginationHeader(self::HEADER_PAGINATION_COUNT);
    }

    /**
     * @return int|null
     */
    public function getPageCount(): ?int
    {
        return $this->getPaginationHeader(self::HEADER_PAGINATION_PAGES);
    }

    /**
     * @return int|null
     */
    public function getPaginationLimit(): ?int
    {
        return $this->getPaginationHeader(self::HEADER_PAGINATION_LIMIT);
    }

    /**
     * @return int|null
     */
    public function getPaginationPage(): ?int
    {
        return $this->getPaginationHeader(self::HEADER_PAGINATION_PAGE);
    }

    public function getNextCursor(): ?string
    {
        return $this->headers[self::HEADER_PAGINATION_NEXT_CURSOR];
    }

    public function hasNextCursor(): bool
    {
        return !empty($this->headers[self::HEADER_PAGINATION_NEXT_CURSOR]);
    }

    /**
     * @param string $header
     *
     * @return int|null
     */
    private function getPaginationHeader(string $header): ?int
    {
        return isset($this->headers[$header]) ? (int)$this->headers[$header] : null;
    }
}
