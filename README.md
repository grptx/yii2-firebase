# yii2-firebase

This component wraps [kreait/firebase-php](https://github.com/kreait/firebase-php/)

## Configuration

```php
...
'components' => [
    'firebase' => [
        'class'=>'grptx\Firebase\Firebase',
        'credential_file'=>'service_account.json', // (see https://firebase.google.com/docs/admin/setup#add_firebase_to_your_app)
        'database_uri'=>'https://my-project.firebaseio.com', // (optional)
    ]
...
]
```

## Usage

Retrive a _reference_ and a _value_
```php
$database = Yii::$app->firebase->getDatabase();
$reference = $database->getReference('path/to/child/location');
$value = $reference->getValue();
```

or just the _value_

```php
$reference = Yii::$app->firebase->getReference('path/to/child/location');
$value = $reference->getValue();
```

for other method see [firebase-php.readthedocs.io.](https://firebase-php.readthedocs.io/en/latest/realtime-database.html)