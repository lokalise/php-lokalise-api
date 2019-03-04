# Providers API

### List providers
https://lokalise.co/api2docs/php/#transition-list-all-providers-get

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
$response = $client->translationProviders->fetchAll();
```

### Retrieve a provider
https://lokalise.co/api2docs/php/#transition-retrieve-a-provider-get

```php
$response = $client->translationProviders->retrieve($providerId);
```


<br/><br/><br/>
<div align='right'>
    <b><a href='/README.md#request'>⇚ Back</a></b>
</div>
<br/>
