<?php
/**
 * Created by PhpStorm.
 * User: gx
 * Date: 27/07/17
 * Time: 15.19
 */
return yii\helpers\ArrayHelper::merge(
	require(__DIR__ . '/config.php'),
	require(__DIR__ . '/web.php'),
	[
	]
);