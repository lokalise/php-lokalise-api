# Cards API

### List cards
https://lokalise.co/api2docs/php/#transition-list-all-cards-get

```php
$response = $client->cards->list(
    $teamId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->cards->fetchAll($teamId);
```

### Create a card
https://lokalise.co/api2docs/php/#transition-create-a-card-post

```php
$response = $client->cards->create(
    [
        'number' => '1234123412341234',
        'exp_month' => 12,
        'exp_year' => 2021,
        'cvc' => 123,
    ]
);
```


### Retrieve a card
https://lokalise.co/api2docs/php/#transition-retrieve-a-card-get

```php
$response = $client->cards->retrieve($cardId);
```

### Delete a card
https://lokalise.co/api2docs/php/#transition-delete-a-card-delete

```php
$response = $client->cards->delete($cardId);
```


<br/><br/><br/>
<div align='right'>
    <b><a href='/README.md#request'>⇚ Back</a></b>
</div>
<br/>
