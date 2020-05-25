# Translations API

### List translations
https://app.lokalise.com/api2docs/curl/#transition-list-all-translations-get

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
https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-translation-get

```php
$response = $client->translations->retrieve($projectId, $translationId);
```

### Update a translation
https://app.lokalise.com/api2docs/curl/#transition-update-a-translation-put

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

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
