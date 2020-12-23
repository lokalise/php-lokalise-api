<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\PaymentCards;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class PaymentCardsTest extends TestCase
{
    use MockEndpointTrait;

    /** @var PaymentCards|MockObject */
    private $mockedCards;

    protected function setUp(): void
    {
        $this->mockedCards = $this->createEndpointMock(PaymentCards::class);
    }

    protected function tearDown(): void
    {
        $this->mockedCards = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedCards);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedCards);
    }

    public function testList(): void
    {
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "payment_cards",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedCards->list($getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "payment_cards",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'payment_cards',
            ],
            $this->mockedCards->fetchAll()->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $cardId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "payment_cards/$cardId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedCards->retrieve($cardId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "payment_cards",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedCards->create($body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $cardId = 123;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "payment_cards/{$cardId}",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedCards->delete($cardId)->getContent()
        );
    }
}
