# Teams API

### List teams
https://lokalise.co/api2docs/php/#transition-list-all-teams-get

```php
$response = $client->teams->list(
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->teams->fetchAll();
```
