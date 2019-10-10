# Contributors API

### List project contributors
https://lokalise.com/api2docs/curl/#transition-list-all-contributors-get

```php
$response = $client->contributors->list(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->contributors->fetchAll($projectId);
```

### Create project contributors
https://lokalise.com/api2docs/curl/#transition-create-contributors-post

```php
$response = $client->contributors->create(
    $projectId,
    [
        'contributors' => [
            [
                'email' => 'contributor.john@email.com',
                'fullname' => 'John',
                'langauges' => [
                    [
                        'lang_iso' => 'en',
                        'is_writable' => false,
                    ]
                ],
            ],
            [
                'email' => 'contributor.jessica@email.com',
                'fullname' => 'Jessica',
                'langauges' => [
                    [
                        'lang_iso' => 'pt',
                        'is_writable' => false,
                    ]
                ],
            ],
        ],
    ]
);
```

### Retrieve project contributor
https://lokalise.com/api2docs/curl/#transition-retrieve-a-contributor-get

```php
$response = $client->contributors->retrieve($projectId, $contributorId);
```

### Update project contributor
https://lokalise.com/api2docs/curl/#transition-update-a-contributor-put

```php
$response = $client->contributors->update(
    $projectId,
    $contributorId,
    [
        'is_admin' => true,
        'admin_rights' => [
            'keys',
            'screenshots',
            'languages',
        ],
    ]
);
```

### Delete project contributor
https://lokalise.com/api2docs/curl/#transition-delete-a-contributor-delete

```php
$response = $client->contributors->delete($projectId, $contributorId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
