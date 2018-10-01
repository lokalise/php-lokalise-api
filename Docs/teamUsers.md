# Team Users API

### List team users
https://lokalise.co/api2docs/php/#transition-list-all-team-users-get

```php
$response = $client->teamUsers->list(
    $teamId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->teamUsers->fetchAll($teamId);
```

### Retrieve a team user
https://lokalise.co/api2docs/php/#transition-retrieve-a-team-user-get

```php
$response = $client->teamUsers->retrieve($teamId, $userId);
```

### Update a team user
https://lokalise.co/api2docs/php/#transition-update-a-team-user-put

```php
$response = $client->teamUsers->update(
    $teamId,
    $userId,
    [
        'role' => 'admin',
    ]
);
```

### Delete a team user
https://lokalise.co/api2docs/php/#transition-delete-a-team-user-delete

```php
$response = $client->teamUsers->delete($teamId, $userId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
