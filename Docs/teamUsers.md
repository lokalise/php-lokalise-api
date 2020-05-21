# Team Users API

### List team users
https://app.lokalise.com/api2docs/curl/#transition-list-all-team-users-get

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
https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-team-user-get

```php
$response = $client->teamUsers->retrieve($teamId, $userId);
```

### Update a team user
https://app.lokalise.com/api2docs/curl/#transition-update-a-team-user-put

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
https://app.lokalise.com/api2docs/curl/#transition-delete-a-team-user-delete

```php
$response = $client->teamUsers->delete($teamId, $userId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
