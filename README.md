# LogViewerBundle

[![Latest Stable Version](https://poser.pugx.org/pagamastarde/pmt-api-client/v/stable)](https://packagist.org/packages/romeritoCL/LogViewerBundle)
[![composer.lock](https://poser.pugx.org/pagamastarde/pmt-api-client/composerlock)](https://packagist.org/packages/romeritoCL/LogViewerBundle)

The Logger viewer bundle is a simple way to display the logs of your Symfony application. It will
read the logs from the monolog bundle route and display them in Json format in the browser.

This way you can fetch them or analyze your application. Be aware that you should not use this
in production without adding a security layer to the route you define.

All the code is tested and inspected by external services.

## How to use

Install the library with composer:
```php
composer require devoralive/log-viewer-bundle
```

Enable the bundle in AppKernel.php
```php
new Devoralive\LogViewerBundle\LogViewerBundle(),
```

Add this in `config/routing.yml`
```php
log-viewer:
    resource: "@LogViewerBundle/Resources/config/routing.yml"
    prefix:   /_logs
```

Once configuration is done, you should be able to visualize your app logs.

To display `dev.log` go to `project.localhost/_logs/_dev`

To display `prod.log` go to `project.localhost/_logs/_prod`

## Help us to improve

We are happy to accept suggestions or pull requests. If you are willing to help us develop better software
please create a pull request here following the PSR-2 code style and we will use reviewable to check
the code and if al test pass and no issues are detected by SensioLab Insights you could will be ready
to merge. 

* [Issue Tracker](https://github.com/romeritoCL/LogViewerBundle/issues)
