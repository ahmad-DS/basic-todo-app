# Todo App

A lightweight Yii todo application focused on CRUD functionality.

## Features
- Create todos
- View all todos
- Update todo items
- Delete todo items

## Setup
1. Install PHP dependencies with Composer.
2. Configure the database in config/db.php.
3. Run migrations with php yii migrate.
4. Start the app with php yii serve.

## Notes
This project is intentionally focused on the todo workflow and not the default Yii starter template.

## Docker

This project is kept minimal and focused on the todo feature. No starter-template documentation is required.

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.

TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](https://codeception.com/).
By default, there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run --env php-builtin
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction.


## Acceptance tests

The `acceptance` suite is configured in `tests/Acceptance.suite.yml`.

### Acceptance tests (PhpBrowser)

By default, acceptance tests use the `PhpBrowser` module and run against the built-in PHP web server started via the
`php-builtin` environment.

```
# run all tests with built-in web server
composer tests

# run acceptance tests only
vendor/bin/codecept run Acceptance --env php-builtin
```

### Acceptance tests (WebDriver + Selenium)

To run acceptance tests in a real browser, switch the `acceptance` suite to use the `WebDriver` module.
`tests/Acceptance.suite.yml` contains an example WebDriver configuration (commented).

1. Download and start [Selenium Server](https://www.selenium.dev/downloads/).
2. Install the corresponding browser driver (for example. [GeckoDriver](https://github.com/mozilla/geckodriver/releases) or
   [ChromeDriver](https://googlechromelabs.github.io/chrome-for-testing/)).
3. Update `tests/Acceptance.suite.yml` to enable `WebDriver` and disable `PhpBrowser`.
4. Run:

```
vendor/bin/codecept run Acceptance --env php-builtin
```

## Code coverage support

Code coverage is configured in `codeception.yml`. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
vendor/bin/codecept run --coverage --coverage-html --coverage-xml --env php-builtin

#collect coverage only for unit tests
vendor/bin/codecept run Unit --coverage --coverage-html --coverage-xml --env php-builtin

#collect coverage for unit and functional tests
vendor/bin/codecept run Functional,Unit --coverage --coverage-html --coverage-xml --env php-builtin
```

You can see code coverage output under the `tests/Support/output` directory.

## Documentation

- [Internals](docs/internals.md)

## Support the project

[![Open Collective](https://img.shields.io/badge/Open%20Collective-sponsor-7eadf1?style=for-the-badge&logo=open%20collective&logoColor=7eadf1&labelColor=555555)](https://opencollective.com/yiisoft)

## Follow updates

[![Official website](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=for-the-badge&logo=yii)](https://www.yiiframework.com/)
[![Follow on X](https://img.shields.io/badge/-Follow%20on%20X-1DA1F2.svg?style=for-the-badge&logo=x&logoColor=white&labelColor=000000)](https://x.com/yiiframework)
[![Telegram](https://img.shields.io/badge/telegram-join-1DA1F2?style=for-the-badge&logo=telegram)](https://t.me/yii_framework_in_english)
[![Slack](https://img.shields.io/badge/slack-join-1DA1F2?style=for-the-badge&logo=slack)](https://yiiframework.com/go/slack)

## License

[![License](https://img.shields.io/badge/License-BSD--3--Clause-brightgreen.svg?style=for-the-badge&logo=opensourceinitiative&logoColor=white&labelColor=555555)](LICENSE.md)
# basic-todo-app
