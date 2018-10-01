# Translations API

### List translations
https://lokalise.co/api2docs/php/#transition-list-all-translations-get

```php
$response = $client->translations->list(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->translations->fetchAll($projectId);
```

### Retrieve a translation
https://lokalise.co/api2docs/php/#transition-retrieve-a-translation-get

```php
$response = $client->translations->retrieve($projectId, $translationId);
```

### Update a translation
https://lokalise.co/api2docs/php/#transition-update-a-translation-put

```php
$response = $client->translations->update(
    $projectId,
    $translationId,
    [
        'translation' => 'Hello, world!',
        'is_fuzzy' => true,
    ]
);
```
