# Contributors API

## Create a LokaliseApiClient

```php
$client = new /Lokalise/LokaliseApiClient($apiToken);
```

### List project contributors

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

```php
$response = $client->contributors->retrieve($projectId, $contributorId);
```

### Update project contributor

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

```php
$response = $client->contributors->delete($projectId, $contributorId);
```
