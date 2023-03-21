<?php

// Load $merge configuration files
$appType = php_sapi_name() == 'cli' ? 'console' : 'web';
$appEnvs = YII_ENV;
$appDirs = __DIR__;

return \yii\helpers\ArrayHelper::merge(
    require("{$appDirs}/common.php"),
    require("{$appDirs}/{$appType}.php"),
    (file_exists("{$appDirs}/common-{$appEnvs}.php")) ? require("{$appDirs}/common-{$appEnvs}.php") : [],
    (file_exists("{$appDirs}/{$appType}-{$appEnvs}.php")) ? require("{$appDirs}/{$appType}-{$appEnvs}.php") : []
);
