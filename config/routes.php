<?php

return [
    '<alias:error|about|contact|reviews>' => 'site/<alias>',
    '/' => 'site/index',
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
];
