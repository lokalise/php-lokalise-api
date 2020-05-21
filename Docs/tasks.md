# Tasks API

### List tasks
https://app.lokalise.com/api2docs/curl/#transition-list-all-tasks-get

```php
$response = $client->tasks->list(
    $projectId,
    [
        'filter_title' => 'Ads',
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->tasks->fetchAll(
    $projectId,
    [
        'filter_title' => 'Ads',
    ]
);
```

### Create a task
https://app.lokalise.com/api2docs/curl/#transition-create-a-task-post

```php
$response = $client->tasks->create(
    $projectId,
    [
        'title' => 'New ads',
        'keys' => [
            12345, 12346, 12347,
        ],
        'languages' => [
            [
                'language_iso' => 'en-gb',
                'users' => [
                    1111, 2222, 3333,
                ],
            ],
            [
                'language_iso' => 'en-ca',
                'users' => [
                    4444, 5555,
                ],
            ],
        ],
        'auto_close_languages' => true,
        'auto_close_task' => true,
    ]
);
```

### Retrieve a task
https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-task-get

```php
$response = $client->tasks->retrieve($projectId, $taskId);
```

### Update a task
https://app.lokalise.com/api2docs/curl/#transition-update-a-task-put

```php
$response = $client->tasks->list(
    $projectId,
    $taskId,
    [
        'close_task' => true,
    ]
);
```

### Delete a task
https://app.lokalise.com/api2docs/curl/#transition-delete-a-task-delete

```php
$response = $client->tasks->delete($projectId, $taskId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
