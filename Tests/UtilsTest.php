<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Utils;

final class UtilsTest extends TestCase
{

    public function testBase64FileEncode()
    {
        $this->assertNull(Utils::base64FileEncode('undefined/path.json'));
        $this->assertNull(Utils::base64FileEncode(''));
        $this->assertNull(Utils::base64FileEncode(null));
        $this->assertNull(Utils::base64FileEncode(1));

        $this->assertEquals(
            'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/2wBDAAICAgICAgMCAgMEAwMDBAUEBAQEBQcFBQUFBQcI' .
            'BwcHBwcHCAgICAgICAgKCgoKCgoLCwsLCw0NDQ0NDQ0NDQ3/wAALCAALABQBAREA/8QANQAAAwEAAAAAAAAAAAAAAAAAAQIGCRAAAgEE' .
            'AgMBAAAAAAAAAAAAAQIDABESIQQFEzFhgf/aAAgBAQAAPwDd538aPIFzwVmxGssQTb9tU/0ndcztJZoeVxkhMKBmxWVGDEgWxlCk+zu1' .
            'qoqIJBuNGiZHbTMSPppa/9k=',
            Utils::base64FileEncode(__DIR__ . '/fixtures/imageFixture.jpg')
        );

        $this->assertEquals(
            'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAALCAAAAABaYvKfAAAAWUlEQVR4AYXOgxEDQRQA0PRfW' .
            'Kzh2bZtG29H+30JNwzBqLIIRkUjngaDPKZJTlSzYBbkn+Afh+eVKUO7IsbOKv1CeN3eoF34s3Y7MGlcLYKN7dH5nZWgep0SQQzTF28HG' .
            'KwAAAAASUVORK5CYII=',
            Utils::base64FileEncode(__DIR__ . '/fixtures/imageFixture.png')
        );

        $this->assertEquals(
            'data:application/json;base64,ewogICJ0ZXN0X2tleV9uYW1lIjogIlRyYW5zbGF0aW9uIDEyMyIsCiAgImFub3RoZXJfa2V5' .
            'X25hbWUiOiAiIgp9Cg==',
            Utils::base64FileEncode(__DIR__ . '/fixtures/fileFixture.json')
        );
    }
}
