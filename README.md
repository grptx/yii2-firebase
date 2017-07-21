# yii2-firebase

This component wraps [kreait/firebase-php](https://github.com/kreait/firebase-php/)

## Configuration

```php
...
'components' => [
    'firebase' => [
        'class'=>'grptx\Firebase',
        'credential_file'=>'credential_file.json',
        'database_uri'=>'https://my-project.firebaseio.com',
    ]
...
]
```