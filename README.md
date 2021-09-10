# Lokalise API v2 official PHP library

Client library for [Lokalise](https://lokalise.com) API 2.0, written with PHP.
[Full API reference](https://app.lokalise.com/api2docs/curl/).

Changelog is located [here](CHANGELOG.md).

## Getting started

1. PHP 7.4.x or greater is required
2. Install LokaliseApiClient using [Composer](#composer-installation) (recommended) or manually

## Composer installation

1. Get [Composer](http://getcomposer.org/)
2. Require LokaliseApiClient with `php composer.phar require lokalise/php-lokalise-api`
3. Add the following to your application's main PHP file: `require 'vendor/autoload.php';`

## Construct LokaliseApiClient
Create and grab your API token at [Lokalise profile](https://app.lokalise.com/profile)

```php
$client = new \Lokalise\LokaliseApiClient($apiToken);
```

## Request

[Comments](Docs/comments.md)

[Contributors](Docs/contributors.md)

[Files](Docs/files.md)

[Keys](Docs/keys.md)

[Languages](Docs/languages.md)

[Payment Cards](Docs/paymentCards.md)

[Projects](Docs/projects.md)

[Queued Processes](Docs/queuedProcesses.md)

[Screenshots](Docs/screenshots.md)

[Snapshots](Docs/snapshots.md)

[Tasks](Docs/tasks.md)

[Teams](Docs/teams.md)

[Team Users](Docs/teamUsers.md)

[Team User Groups](Docs/teamUserGroups.md)

[Translations](Docs/translations.md)

[Translation Providers](Docs/translationProviders.md)

[Orders](Docs/orders.md)

[Webhooks](Docs/webhooks.md)

## Response

```php
/** @var \Lokalise\LokaliseApiResponse $response */
$response = $client->languages->listSystem();

$response->
    headers                // Associative array of Lokalise headers received
    getContent()           // Return response data as associative array
    __toArray()            // getContent() alias. Return response data as associative array
    __toString()           // Return JSON encoded response data
    getTotalCount()        // Return total count of filtered items in List methods
    getPageCount()         // Return count of pages in List methods (based on limit parameter)
    getPaginationLimit()   // Return pagination limit used in the request
    getPaginationPage()    // Return current page of the request
```

## Utils

```php
\Lokalise\Utils::
    base64FileEncode($filePath)    // Get base64 encoded contents with leading mime type
```

## Exceptions and errors

```php
\Lokalise\Exceptions\LokaliseApiException       // Exception throws when Lokalise API can't be reached using Guzzle
\Lokalise\Exceptions\LokaliseResponseException  // Exception throws when Lokalise API responded with a single error
```

Best practice

```php
$client = new \Lokalise\LokaliseApiClient($apiToken);

try {
    $language = $client->languages->retrieve($projectId, $languageId)->getContent();
} catch (\Lokalise\Exceptions\LokaliseApiException $e) {
    // try again later or break
} catch (\Lokalise\Exceptions\LokaliseResponseException $e) {
    // Request cannot be completed. More details in {$e->getCode()} and {$e->getMessage()}
    // break
}
```

## Rate limits
[Access to all endpoints is limited](https://app.lokalise.com/api2docs/curl/#resource-rate-limits) to 6 requests per second from 14 September, 2021. This limit is applied per API token and per IP address. If you exceed the limit, a 429 HTTP status code will be returned and the corresponding exception will be raised that you should handle properly. To handle such errors, we recommend an exponential backoff mechanism with a limited number of retries.

Only one concurrent request per token is allowed.
