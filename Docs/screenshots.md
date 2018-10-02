# Screenshots API

### List screenshots
https://lokalise.co/api2docs/php/#transition-list-all-screenshots-get

```php
$response = $client->screenshots->list(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->screenshots->fetchAll($projectId);
```

### Create screenshots
https://lokalise.co/api2docs/php/#transition-create-screenshots-post

```php
$response = $client->screenshots->create(
    $projectId,
    [
        'screenshots' => [
            [
                'data' => 'data:image/jpeg;base64,D94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGL.....',
                'key_ids' => [
                    12345, 12346
                ],
                'tags' => [
                    'onboarding',
                ],
            ],
            [
                'data' => \Lokalise\Utils::base64FileEncode('/tmp/onboarding.jpg'),
                'key_ids' => [
                    12347, 12348
                ],
                'tags' => [
                    'onboarding',
                ],
            ],
        ]
    ]
);
```

### Retrieve a screenshot
https://lokalise.co/api2docs/php/#transition-retrieve-a-screenshot-get

```php
$response = $client->screenshots->retrieve($projectId, $screenshotId);
```

### Update a screenshot
https://lokalise.co/api2docs/php/#transition-update-a-screenshot-put

```php
$response = $client->screenshots->update(
    $projectId,
    $screenshotId,
    [
        'title' => 'Onboarding',
        'key_ids' => [
            12345, 12346, 12347
        ]
    ]
);
```

### Delete a screenshot
https://lokalise.co/api2docs/php/#transition-delete-a-screenshot-delete

```php
$response = $client->screenshots->delete($projectId, $screenshotId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
