# yii2-firebase

This component wraps [kreait/firebase-php](https://github.com/kreait/firebase-php/)

## Configuration

```php
...
'components' => [
    'firebase' => [
        'class'=>'grptx\Firebase\Firebase',
        'credential_file'=>'service_account.json', // (see https://firebase.google.com/docs/admin/setup#add_firebase_to_your_app)
        'database_uri'=>'https://my-project.firebaseio.com',
    ]
...
]
```