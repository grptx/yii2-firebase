<?php

/**
 * Yii bootstrap file.
 *
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace grptx\Firebase\yii2;
require(__DIR__ . '/BaseYii.php');
use yii\di\Container;
/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It extends from [[\yii\BaseYii]] which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of [[\yii\BaseYii]].
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Roberto Rossetti <r.rossetti@melogra.no>
 * @since 2.0
 */
class Yii extends \grptx\Firebase\yii2\BaseYii
{
}

spl_autoload_register(['Yii', 'autoload'], true, true);
Yii::$classMap = require(__DIR__ . '/../../../../yiisoft/yii2/classes.php');
Yii::$container = new Container();