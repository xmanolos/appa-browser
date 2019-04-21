# Contributing to Appa Browser.

_Read this document in other languages: [Português do Brasil](.github/pt-br/CONTRIBUTING.md)._

1. [Setting up the application.](#setting-up-the-application)
2. [Running the application.](#running-the-application)
3. [Generating test data.](#generating-test-data)
4. [Submitting an Issue.](#submitting-an-issue)
5. [Submitting a Pull Request.](#submitting-a-pull-request)

## Setting up the application.

To setting up the application, follow the steps below.

1. Clone the repository: `git clone https://github.com/xmanolos/appa-browser`
2. Access the cloned folder: `cd appa-browser`
3. Duplicate the `.env.example` file by renaming it to `.env` only.
4. Install the [Composer](https://getcomposer.org/) dependencies: `composer install`
5. Install the [Yarn](https://yarnpkg.com/) dependencies: `yarn install`
6. Generate an application key with [Artisan](https://laravel.com/docs/master/artisan): `php artisan key:generate`

## Running the application.

To run the application, follow the steps below.

##### Using [Docker](https://www.docker.com/), do:
1. Access the cloned folder.
2. Run: `docker-compose -f docker\application.yml up -d`

##### Using [Laravel Serving](https://laravel.com/docs/master/installation#installing-laravel), do:
1. Follow the [installation instructions in Laravel Docs](https://laravel.com/docs/master/installation#installing-laravel). _Note: we use version 5.8._

## Generating test data.

To generate test data, follow the steps below.

##### Using [Docker](https://www.docker.com/), do:
1. Access the clone folder.
2. Open your `.env` file.
3. Set it to point to the test containers. The connection information for these is contained in the `docker\application.yml` file.
4. Close the file.
5. Run: `php artisan data:generate {driver}`

##### Otherwise, do:
1. Create a [PostgreSQL](https://www.postgresql.org/) or [MySQL](https://www.mysql.com/) database (or both).
2. Access the clone folder.
3. Open your `.env` file.
4. Set it to point to the created database.
5. Close the file.
6. Run: `php artisan data:generate {driver}`

The available drivers are `pgsql` for [PostgreSQL](https://www.postgresql.org/) and `mysql` for [MySQL](https://www.mysql.com/).

In either case you can use JavaScript methods to populate the connection data on the Connection Screen. Call via console:
1. For [PostgreSQL](https://www.postgresql.org/) connection: `testConnectionPgsql();`.
2. For [MySQL](https://www.mysql.com/) connection: `testConnectionMysql();`.

## Submitting an Issue.

Before you submit an issue, please search the [issue tracker](https://github.com/xmanolos/appa-browser/issues), maybe an issue for your problem already exists and the discussion might inform you of workarounds readily available.

We want to fix all the issues as soon as possible, but before fixing a bug we need to reproduce and confirm it. In order to reproduce bugs we will systematically ask you to provide a minimal reproduction scenario.

## Submitting a Pull Request.

Before you submit your Pull Request (PR) consider the following guidelines:

1. Search in this repository for an PR (open or closed) that relates to your submission. You don't want to duplicate effort.
2. Fork this repository.
3. Create a branch for your changes, so we'll be easier to merge:

    ```shell
    git checkout -b my-fix-branch master
    ```

5. Make your changes with a well-written code.
6. Make sure your changes are not going to break.
7. Commit your changes using a descriptive commit message. If you are correcting a problem, please report it in your commit.
8. Push your branch to GitHub:

    ```shell
    git push origin my-fix-branch
    ```

9. In GitHub, send a pull request to `appa-browser:master`.

That's it! Thank you for your contribution!
