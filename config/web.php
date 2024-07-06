<?php

$config = [
    'viewPath' => dirname(__DIR__) . '/views',
    'layoutPath' => dirname(__DIR__) . '/views/layouts',
    'aliases' => [
        '@webroot'  => dirname(__DIR__) . '/public',
    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap5\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap5\BootstrapPluginAsset' => [
                    'js' => [],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'HqGoyA3Z2wn6wOEpRAmWRd9ZokJZc95P',
        ],
        'user' => [
            'identityClass' => 'app\models\Identity',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require(__DIR__ . '/routes.php'),
        ],
        'view' => [
            'class' => 'app\helpers\View',
        ],
    ],
];

return $config;
