# Webhooks API

### List all webhooks
https://app.lokalise.com/api2docs/curl/#transition-list-all-webhooks-get

```php
$response = $client->webhooks->list(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->webhooks->fetchAll(
    $projectId 
);
```

### Create a webhook
https://app.lokalise.com/api2docs/curl/#transition-create-a-webhook-post

```php
$response = $client->webhooks->create(
    $projectId,
    [
        'url' => 'https://my.domain.com/webhook',
        'events' => [
            'project.translation.proofread',
            'project.translation.updated',
        ],
        'event_lang_map' => [
            [
                'event' => 'project.translation.updated',
                'lang_iso_codes' => [
                    'en_GB',
                ],
            ],
        ],
    ]
);
```

### Retrieve a webhook
https://app.lokalise.com/api2docs/curl/#transition-retrieve-a-webhook-get

```php
$response = $client->webhooks->retrieve($projectId, $webhookId);
```

### Update a webhook
https://app.lokalise.com/api2docs/curl/#transition-update-a-webhook-put

```php
$response = $client->webhooks->update(
    $projectId,
    $webhookId,
    [
        'events' => [
            'project.translation.proofread',
            'project.translation.updated',
            'project.imported',
        ],
        'event_lang_map' => [
            [
                'event' => 'project.translation.proofread',
                'lang_iso_codes' => [
                    'en_GB',
                ],
            ],
            [
                'event' => 'project.translation.updated',
                'lang_iso_codes' => [
                    'en_GB'
                ],
            ],
        ],
    ]
);
```


### Delete a webhook
https://app.lokalise.com/api2docs/curl/#transition-delete-a-webhook-delete

```php
$response = $client->webhooks->delete($projectId, $webhookId);
```

### Regenerate a webhook secret
https://app.lokalise.com/api2docs/curl/#transition-regenerate-a-webhook-secret-patch

```php
$response = $client->webhooks->regenerate($projectId, $webhookId);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
