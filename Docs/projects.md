# Projects API

### List projects
https://lokalise.com/api2docs/curl/#transition-list-all-projects-get

```php
$response = $client->projects->list(
    [
        'filter_team_id' => 1234,
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->projects->fetchAll(
    [
        'filter_team_id' => 1234,
    ]
);
```

### Create a project
https://lokalise.com/api2docs/curl/#transition-create-a-project-post

```php
$response = $client->projects->create(
    [
        'name' => 'New project',
        'team_id' => 1234,
    ]
);
```

### Retrieve a project
https://lokalise.com/api2docs/curl/#transition-retrieve-a-project-get

```php
$response = $client->projects->retrieve($projectId);
```

### Update a project
https://lokalise.com/api2docs/curl/#transition-update-a-project-put

```php
$response = $client->projects->update(
    $projectId,
    [
        'name' => 'Old project',
    ]
);
```

### Empty a project
https://lokalise.com/api2docs/curl/#transition-empty-a-project-put

```php
$response = $client->projects->empty($projectId);
```

### Delete a project
https://lokalise.com/api2docs/curl/#transition-delete-a-project-delete

```php
$response = $client->projects->delete($projectId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
