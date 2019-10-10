# Languages API

### List system languages
https://lokalise.com/api2docs/curl/#transition-list-system-languages-get

```php
$response = $client->languages->listSystem(
    [
        'limit' => 200,
        'page' => 1,
    ]
);
```

```php
$response = $client->languages->fetchAllSystem();
```

### List project languages
https://lokalise.com/api2docs/curl/#transition-list-project-languages-get

```php
$response = $client->languages->list(
    $projectId,
    [
        'limit' => 200,
        'page' => 1,
    ]
);
```

```php
$response = $client->languages->fetchAll($projectId);
```

### Create languages
https://lokalise.com/api2docs/curl/#transition-create-languages-post

```php
$response = $client->languages->create(
    $projectId,
    [
        'languages' => [
            [
                'lang_iso' => 'en_GB',
                'custom_iso' => 'en-gb',
            ],
            [
                'lang_iso' => 'en_CA',
                'custom_iso' => 'en-ca',
            ],
        ]
    ]
);
```

### Retrieve a language
https://lokalise.com/api2docs/curl/#transition-retrieve-a-language-get

```php
$response = $client->languages->retrieve($projectId, $languageId);
```

### Update a language
https://lokalise.com/api2docs/curl/#transition-update-a-language-put

```php
$response = $client->languages->update(
    $projectId,
    $languageId,
    [
        'lang_iso' => 'en-ca',
    ]
);
```

### Delete a language
https://lokalise.com/api2docs/curl/#transition-delete-a-language-delete

```php
$response = $client->languages->delete($projectId, $languageId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
