# Comments API

### List project comments
https://lokalise.co/api2docs/php/#transition-list-project-comments-get

```php
$response = $client->comments->listProject(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->comments->fetchAllProject($projectId);
```

### List key comments
https://lokalise.co/api2docs/php/#transition-list-key-comments-get

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

```php
$response = $client->comments->fetchAllKey($projectId, $keyId); 
```

### Create comments
https://lokalise.co/api2docs/php/#transition-create-comments-post

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
https://lokalise.co/api2docs/php/#transition-retrieve-a-comment-get

```php
$response = $client->comments->retrieve($projectId, $keyId, $commentId);
```

### Delete a comment
https://lokalise.co/api2docs/php/#transition-delete-a-comment-delete

```php
$response = $client->comments->delete($projectId, $keyId, $commentId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/lokalise/php-lokalise-api/blob/master/README.md#request">⇚ Back</a></b>
</div>
<br/>
