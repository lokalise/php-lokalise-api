# Contributors API

### List project contributors
https://lokalise.co/api2docs/php/#transition-list-all-contributors-get

```php
$response = $client->contributors->list(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

### Create project contributors
https://lokalise.co/api2docs/php/#transition-create-contributors-post

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
https://lokalise.co/api2docs/php/#transition-retrieve-a-contributor-get

```php
$response = $client->contributors->retrieve($projectId, $contributorId);
```

### Update project contributor
https://lokalise.co/api2docs/php/#transition-update-a-contributor-put

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
https://lokalise.co/api2docs/php/#transition-delete-a-contributor-delete

```php
$response = $client->contributors->delete($projectId, $contributorId);
```
