# Orders API

### List orders
https://lokalise.com/api2docs/curl/#transition-list-all-orders-get

```php
$response = $client->orders->list(
    $teamId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->orders->fetchAll($teamId);
```

### Create an order
https://lokalise.com/api2docs/curl/#transition-create-an-order-post

```php
$response = $client->orders->create(
    $teamId,
    [
        "project_id" => "650194365c6d1c1a3f4641.xxxxxxxx",
        "card_id" => 1234,
        "briefing" => "Terms of use of our app.",
        "source_language_iso" => "en",
        "target_language_isos" => [
            "fr", 
            "de", 
            "it"
        ],
        "keys" => [
            12345, 
            67890
        ],
        "provider_slug" => "languageinspired",
        "translation_tier" => 1,
    ]
);
```


### Retrieve an order
https://lokalise.com/api2docs/curl/#transition-retrieve-an-order-get

```php
$response = $client->orders->retrieve($teamId, $orderId);
```


<br/><br/><br/>
<div align='right'>
    <b><a href='/README.md#request'>⇚ Back</a></b>
</div>
<br/>
