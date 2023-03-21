Yii2 Web App
================

Yii2 web application


DIRECTORY STRUCTURE
-------------------

```
app/
    assets/         contains assets for the web app.
    controllers/    contains frontend module, which contains the frontend part of the web app.
    models/         contains app models
    modules/        contains modules
config/
    bootstrap.php   contains app bootstrap constants & phalcon autoloaders
    constants.php   contains app constants
    main.php        contains the sample of the configuration file
    redirect.php    contains the URLs redirections links
    routes.php      contains routes of all the modules
docker/             contains docker image files
public/             contains publically accessible files and scripts
static/             contains static assets
runtime/            contains directory for logs and cache (incase of file based cache)
vendor/             contains composer packages
```


Setup
-----
1.  run `cp .env-dist .env` and set the contants and adjust the app.
2.  run `php composer.phar install` to instrall composer requirements
3.  run `docker compose up ` to tun docker container