<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
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
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/bootstrap-icons/bootstrap-icons.css',
        'vendor/glightbox/css/glightbox.min.css',
        'vendor/swiper/swiper-bundle.min.css',
        'vendor/aos/aos.css',
        'css/main.css',
        'css/site.css',
    ];
    public $js = [
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/purecounter/purecounter_vanilla.js',
        'vendor/glightbox/js/glightbox.min.js',
        'vendor/swiper/swiper-bundle.min.js',
        'vendor/php-email-form/validate.js',
        'vendor/aos/aos.js',
        'js/main.js',
        'js/site.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];
}
