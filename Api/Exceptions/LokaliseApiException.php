<?php

namespace Lokalise\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class LokaliseApiException extends Exception
{
    protected ?ResponseInterface $response = null;

    public function __construct(
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
        ?ResponseInterface $response = null
    ) {
        $this->response = $response;

        parent::__construct($message, $code, $previous);
    }

    public function hasResponse(): bool
    {
        return $this->response !== null;
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
