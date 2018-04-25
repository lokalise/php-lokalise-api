# Comments API

## Create a LokaliseApiClient

```php
$client = new LokaliseApiClient($apiToken);
```

### List project comments

```php
$comments = $client->comments->listProject(
    $projectId,
    [
        'limit' => 20,
        'offset' => 1,
    ]
);
```

### List key comments

```php
$comments = $client->comments->listKey(
    $projectId,
    $keyId,
    [
        'limit' => 20,
        'offset' => 1,
    ]
); 
```

### Create comments

```php
$comments = $client->comments->create(
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
$comment = $client->comments->retrieve($projectId, $keyId, $commentId);
```

### Delete a comment

```php
$comment = $client->comments->delete($projectId, $keyId, $commentId);
```
