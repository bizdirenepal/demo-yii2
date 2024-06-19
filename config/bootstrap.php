<?php

// Load default settings via dotenv from file
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

// Checks & validation
$dotenv->required('YII_DEBUG', ['', '0', '1', 'true', true]);
$dotenv->required('YII_ENV', ['dev', 'prod', 'test']);
$dotenv->required([
    'APP_NAME',
    'YII_TRACE_LEVEL',
]);

// Additional Validations
if (!preg_match('/^[a-z0-9_-]{3,16}$/', getenv('APP_NAME'))) {
    throw new \Dotenv\Exception\ValidationException(
        'APP_NAME must only be lowercase, dash or underscore and 3-16 characters long.'
    );
}
