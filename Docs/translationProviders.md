# Providers API

### List providers
https://app.lokalise.com/api2docs/curl/#transition-list-all-providers-get

```php
$response = $client->translationProviders->list(
    $teamId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->translationProviders->fetchAll($teamId);
```

### Retrieve a provider
https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-provider-get

```php
$response = $client->translationProviders->retrieve($teamId, $providerId);
```


<br/><br/><br/>
<div align='right'>
    <b><a href='/README.md#request'>⇚ Back</a></b>
</div>
<br/>
