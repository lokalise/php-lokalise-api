# Keys API

### List project keys
https://lokalise.co/api2docs/php/#transition-list-all-keys-get

```php
$response = $client->keys->list(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
        'filter_placeholder_mismatch' => 1,
        'filter_platforms' => [
            'web',
            'other',
        ],
    ]
);
```

```php
$response = $client->keys->fetchAll(
    $projectId,
    [
        'filter_placeholder_mismatch' => 1,
        'filter_platforms' => [
            'web',
            'other',
        ],
    ]
);
```

### Create keys
https://lokalise.co/api2docs/php/#transition-create-keys-post

```php
$response = $client->keys->create(
    $projectId,
    [
        'keys' => [
            [
                'key_name' => 'index.title',
                'description' => 'Title of main page',
                'platforms' => [
                    'web',
                ],
                'filenames' => [
                    'web' => 'main.json',
                ],
                'tags' => [
                    'index',
                ],
                'translations' => [
                    [
                        'language_iso' => 'en',
                        'translation' => 'Welcome to main page!',
                    ],
                ],
                'char_limit' => 80,
            ],
            [
                'key_name' => 'index.meta.title',
                'description' => 'META Title of main page',
                'platforms' => [
                    'web',
                ],
                'filenames' => [
                    'web' => 'main.json',
                ],
                'tags' => [
                    'index', 'meta',
                ],
                'translations' => [
                    [
                        'language_iso' => 'en',
                        'translation' => 'Main page',
                    ],
                ],
                'char_limit' => 20,
            ],
        ],
    ]
);
```

### Retrieve a key
https://lokalise.co/api2docs/php/#transition-retrieve-a-key-get

```php
$response = $client->keys->retrieve($projectId, $keyId);
```

### Update a key
https://lokalise.co/api2docs/php/#transition-retrieve-a-key-get

```php
$response = $client->keys->update(
    $projectId,
    $keyId,
    [
        'tags' => [
            'index', 'meta', 'updated',
        ],
    ]
);
```

### Update multiple keys (bulk update)
https://lokalise.co/api2docs/php/#transition-bulk-update-put

```php
$response = $client->keys->bulkUpdate(
    $projectId,
    [
        'keys' => [
            'key_id' => 420,
            'tags' => [
                'index', 'meta', 'updated',
            ],
            'translations' => [
                [
                    'language_iso' => 'en',
                    'translation' => 'Frontpage',
                ],
            ],
        ],
    ]
);
```

### Delete a key
https://lokalise.co/api2docs/php/#transition-delete-a-key-delete

```php
$response = $client->keys->delete($projectId, $keyId);
```

### Delete multiple keys
https://lokalise.co/api2docs/php/#transition-delete-multiple-keys-delete

```php
$response = $client->keys->bulkDelete(
    $projectId,
    [
        'keys' => [
            12345, 12346,
        ],
    ]
);
```
