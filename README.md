# yii2-firebase

This Yii2 component wraps [kreait/firebase-php](https://github.com/kreait/firebase-php/) and allow to easy connect to the Firebase realtime database 

## Installation

Preferred way to install is through [Composer](https://getcomposer.org): 
```shell
php composer.phar require grptx/yii2-firebase:~0.3.1
```
Or, you may add

```php
"grptx/yii2-firebase": "~0.3.1"
```

to the require section of your `composer.json` file and execute `php composer.phar update`.

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

### Optional
to use the autocomplete function of IDE (i.e. Phpstorm) you can optionally replace in the web/index.php the inclusion of Yii.php file and the Application instance:

replace:
```php
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
//and 
(new yii\web\Application($config))->run();
```
with:
```php
require (__DIR__.'/../../vendor/grptx/yii2-firebase/src/yii2/Yii.php');
//and
(new \grptx\Firebase\web\Application($config))->run();

```
now when you need you can use grptx\Firebase\yii2\Yii instead of Yii to use autocomplete of your IDE

## Usage

Retrive a _database_ ,_reference_ and a _value_
```php
$database = Yii::$app->firebase->getDatabase();
$reference = $database->getReference('path/to/child/location');
$value = $reference->getValue();
```

or just the _reference_ and a _value_

```php
$reference = Yii::$app->firebase->getReference('path/to/child/location');
$value = $reference->getValue();
```

for other method see [firebase-php.readthedocs.io.](https://firebase-php.readthedocs.io/en/latest/realtime-database.html)