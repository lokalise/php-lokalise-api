# Team Users API

### List team user groups
https://lokalise.co/api2docs/php/#transition-list-all-groups-get

```php
$response = $client->teamUserGroups->list(
    $teamId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->teamUserGroups->fetchAll($teamId);
```

### Retrieve a team user group
https://lokalise.co/api2docs/php/#transition-retrieve-a-group-get

```php
$response = $client->teamUserGroups->retrieve($teamId, $groupId);
```

### Update a team user group
https://lokalise.co/api2docs/php/#transition-update-a-group-put

```php
$response = $client->teamUserGroups->update(
    $teamId,
    $groupId,
    [
            'name' => 'Proofreading admins',
            'is_reviewer'=> true,
            'is_admin'=> true,
            'admin_rights'=> [
                'upload',
                'download',
                'tasks',
                'contributors',
                'screenshots',
                'manage_keys',
                'manage_languages',
                'settings',
                'activity',
                'statistics'
            ],
            'languages' => [
                'reference'=> [],
                'contributable'=> []
            ]
        }
    ]
```

### Delete a team user group
https://lokalise.co/api2docs/php/#transition-delete-a-group-delete

```php
$response = $client->teamUserGroups->delete($teamId, $groupId);
```

### Add projects to team user group
https://lokalise.co/api2docs/php/#transition-add-projects-to-group-put

```php
$response = $client->teamUserGroups->addProjects(
    $teamId,
    $groupId,
    [
        'projects' => [
            '598901215bexxx43dcba74.xxx',
        ],
    ]
```


### Remove projects from team user group
https://lokalise.co/api2docs/php/#transition-remove-projects-from-group-put

```php
$response = $client->teamUserGroups->removeProjects(
    $teamId,
    $groupId,
    [
        'projects' => [
            '598901215bexxx43dcba74.xxx',
        ],
    ]
```


### Add members to team user group
https://lokalise.co/api2docs/php/#transition-add-members-to-group-put

```php
$response = $client->teamUserGroups->addMembers(
    $teamId,
    $groupId,
    [
        'users' => [
            12345,
        ],
    ]
```


### Remove projects from team user group
https://lokalise.co/api2docs/php/#transition-remove-members-from-group-put

```php
$response = $client->teamUserGroups->removeMembers(
    $teamId,
    $groupId,
    [
        'users' => [
            12345,
        ],
    ]
```

<br/><br/><br/>
<div align='right'>
    <b><a href='/README.md#request'>⇚ Back</a></b>
</div>
<br/>