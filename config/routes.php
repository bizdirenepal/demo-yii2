<?php

return [
    '<alias:error|login|logout|signup|request-password-reset|reset-password>' => 'site/<alias>',
    '/' => 'site/index',
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
];
