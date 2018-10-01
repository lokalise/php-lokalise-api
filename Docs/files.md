# Files API

### List project files
https://lokalise.co/api2docs/php/#transition-list-all-files-get

```php
$response = $client->files->list(
    $projectId,
    [
        'limit' => 20,
        'page' => 1,
    ]
);
```

```php
$response = $client->files->fetchAll($projectId);
```

### Upload a file
https://lokalise.co/api2docs/php/#transition-upload-a-file-post

```php
$response = $client->files->upload(
    $projectId,
    [
        'data' => 'D94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGL.....',
        'filename' => 'en.json',
        'lang_iso' => 'en',
        'slashn_to_linebreak' => true,
    ]
);
```

### Download files
https://lokalise.co/api2docs/php/#transition-download-files-post

```php
$response = $client->files->download(
    $projectId,
    [
        'format' => 'json',
        'oringal_filenames' => true,
        'directory_prefix' => '/%LANG_ISO%/',
        'language_mapping' => [
            [
                'original_language_iso' => 'zh_CN',
                'custom_language_iso' => 'cn',
            ],
        ],
    ]
);
```

<br/><br/><br/>
<div align="right">
    <b><a href="/README.md#request">⇚ Back</a></b>
</div>
<br/>
