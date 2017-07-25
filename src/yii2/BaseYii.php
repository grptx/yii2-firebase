<?php
/**
 * Created by PhpStorm.
 * User: gx
 * Date: 25/07/17
 * Time: 11.10
 */

namespace grptx\Firebase\yii2;


use grptx\Firebase\web\Application;

class BaseYii extends \yii\BaseYii {
	/**
	 * @var Application \yii\console\Application|grptx\Firebase\web\Application the application instance
	 */
	public static $app;
}