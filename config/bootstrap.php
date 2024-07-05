<?php

// Load default settings via dotenv from file
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

// Checks & validation
$dotenv->required('YII_DEBUG', ['', '0', '1', 'true', true]);
$dotenv->required('YII_ENV', ['dev', 'prod', 'test']);
$dotenv->required([
    'APP_ID',
    'APP_NAME',
    'YII_TRACE_LEVEL',
]);

// Additional Validations
if (!preg_match('/^[0-9]{1,16}$/', getenv('APP_ID'))) {
    throw new \Dotenv\Exception\ValidationException(
        'APP_ID must only be numerics and 3-16 characters long.'
    );
}
