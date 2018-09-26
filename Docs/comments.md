# Comments API

## Create a LokaliseApiClient

```php
$client = new /Lokalise/LokaliseApiClient($apiToken);
```

### List project comments

```php
$response = $client->comments->listProject(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

### List key comments

```php
$response = $client->comments->listKey(
    $projectId,
    $keyId,
    [
        'limit' => 20,
        'page' => 1,
    ]
); 
```

### Create comments

```php
$response = $client->comments->create(
    $projectId,
    $keyId,
    [
        'comments' => [
            [
                'comment' => 'My new comment #1',
            ],
            [
                'comment' => 'My new comment #2',
            ],
        ]
    ]
);
```

### Retrieve a comment

```php
$response = $client->comments->retrieve($projectId, $keyId, $commentId);
```

### Delete a comment

```php
$response = $client->comments->delete($projectId, $keyId, $commentId);
```
