<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/static';
    public $baseUrl = '@web/static';
    public $css = [
        'css/variables.css',
        'css/fonts.css',
        'js/vendor/fancybox/fancybox.css',
        'js/vendor/slick/slick/slick.css',
        'js/vendor/slick/slick/slick-theme.css',
        'fonts/piranha_icons/style.css',
        'css/reset.css',
        'css/modal.css',
        'css/style.css',
        'css/adults.css',
    ];
    public $js = [
        'js/vendor/fancybox/fancybox.min.js',
        'js/vendor/slick/slick/slick.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
