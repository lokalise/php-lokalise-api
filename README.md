# PHP Lokalise api

A simple REST API for [Lokalise](https://lokalise.co), written with PHP5.
Lokalise API [Docs](https://lokalise.co/api2docs/php/).

## Getting started

1. PHP 5.3.x or greater is required
2. Install LokaliseApiClient using [Composer](#composer-installation) (recommended) or manually

## Composer Installation

1. Get [Composer](http://getcomposer.org/)
2. Require LokaliseApiClient with `php composer.phar require lokalise/php-lokalise-api`
3. Add the following to your application's main PHP file: `require 'vendor/autoload.php';`

## Construct LokaliseApiClient
Create and grab your API token at [Lokalise profile](http://lokalise.local/profile)

```php
$client = new /Lokalise/LokaliseApiClient($apiToken);
```

## Request

[Comments](Docs/comments.md)

[Contributors](Docs/contributors.md)

[Files](Docs/files.md)

[Keys](Docs/keys.md)

[Languages](Docs/languages.md)

[Projects](Docs/projects.md)

[Screenshots](Docs/screenshots.md)

[Snapshots](Docs/snapshots.md)

[Tasks](Docs/tasks.md)

[Teams](Docs/teams.md)

[Team Users](Docs/teamUsers.md)

[Translations](Docs/translations.md)

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
