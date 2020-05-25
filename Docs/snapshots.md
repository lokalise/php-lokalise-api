# Snapshots API

### List snapshots
https://app.lokalise.com/api2docs/curl/#transition-list-all-snapshots-get

```php
$response = $client->snapshots->list(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->snapshots->fetchAll($projectId);
```

### Create a snapshot
https://app.lokalise.com/api2docs/curl/#transition-create-a-snapshot-post

```php
$response = $client->snapshots->create(
    $projectId,
    [
        'title' => 'Api snapshot',
    ]
);
```

### Restore a snapshot
https://app.lokalise.com/api2docs/curl/#transition-restore-a-snapshot-post

```php
$response = $client->snapshots->restore($projectId, $snapshotId);
```

### Delete a snapshot
https://app.lokalise.com/api2docs/curl/#transition-delete-a-snapshot-delete

```php
$response = $client->snapshots->delete($projectId, $snapshotId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
