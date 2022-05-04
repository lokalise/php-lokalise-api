# Branches API

### List project branches
https://app.lokalise.com/api2docs/curl/#transition-list-all-branches-get

```php
$response = $client->branches->listBranches(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

### Retrieve project branch
https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-branch-get

```php
$response = $client->branches->retrieve(
    $projectId,
    $branchId
);
```

### Create project branch
https://app.lokalise.com/api2docs/curl/#transition-create-a-branch-post

```php
$response = $client->branches->create(
    $projectId,
    [
        'name' => 'hotfix/really-important',
    ]
);
```

### Update project branch
https://app.lokalise.com/api2docs/curl/#transition-update-a-branch-put

```php
$response = $client->branches->update(
    $projectId,
    $branchId,
    [
        'name' => 'hotfix/needed-yesterday',
    ]
);
```

### Delete project branch
https://app.lokalise.com/api2docs/curl/#transition-delete-a-branch-delete

```php
$response = $client->branches->delete(
    $projectId,
    $branchId
);
```

### Merge project branch
https://app.lokalise.com/api2docs/curl/#transition-merge-a-branch-post

```php
$response = $client->branches->merge(
    $projectId,
    $branchId,
    [
        'force_conflict_resolve_using' => 'target',
    ]
);
```
