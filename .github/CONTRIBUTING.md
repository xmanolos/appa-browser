# Contributing to DB Browser

## Getting Started

### Setting up the environment

To build the application, follow the steps below.

1. Clone the repository: `git clone https://github.com/xdanif/db-browser`
2. Access the clone folder: `cd db-browser`
3. Duplicate the `.env.example` file by renaming it to `.env` only.
4. Install the [Composer](https://getcomposer.org/) dependencies: `composer install`
5. Install the [Yarn](https://yarnpkg.com/) dependencies: `yarn install`
6. Generate an application key with [Artisan](https://laravel.com/docs/master/artisan): `php artisan key:generate`

### Running the code

To run the development application run it with 

If you use [Docker](https://www.docker.com/), do:
1. Access the clone folder.
2. Run: `docker-compose -f db-browser.yml up -d`

If you use [Laravel Serving](https://laravel.com/docs/master/installation#installing-laravel), do:
1. Follow the [installation instructions in Laravel Docs](https://laravel.com/docs/master/installation#installing-laravel).

Note: we use version 5.8.

If you use [Wamp](http://www.wampserver.com/en/), [Xamp](https://www.apachefriends.org/index.html) or any other solution, the most I can offer you is a link to instructions on how to start your first project in Laravel. Use it as a basis to build our application. See: [Laravel Tutorial: Step by Step Guide to Building Your First Laravel Application](https://laravel-news.com/your-first-laravel-application).

### Obtaining test data

If you want to have test data to see how the application works without having to worry about the connection, you can do this with the instructions below.

If you use [Docker](https://www.docker.com/), do:
1. Access the clone folder.
2. Run: `docker-compose -f db-browser-test.yml up -d`
3. Open your `.env` file.
4. Set it to point to the test containers. The connection information for these is contained in the `docker-compose-test.yml` file.

Otherwise, do:
1. Create a [PostgreSQL](https://www.postgresql.org/) or [MySQL](https://www.mysql.com/) database (or both).
2. Open your `.env` file.
2. Set it to point to the created database.

In either case you can use JavaScript methods to populate the connection data on the Connection Screen. Call via console:
1. For [PostgreSQL](https://www.postgresql.org/) connection: `testConnectionPgsql();`.
2. For [MySQL](https://www.mysql.com/) connection: `testConnectionMysql();`.

## Submission Guidelines

### Submitting an Issue

Before you submit an issue, please search the [issue tracker](https://github.com/xdanif/db-browser/issues), maybe an issue for your problem already exists and the discussion might inform you of workarounds readily available.

We want to fix all the issues as soon as possible, but before fixing a bug we need to reproduce and confirm it. In order to reproduce bugs we will systematically ask you to provide a minimal reproduction scenario.

### Submitting a Pull Request (PR)

Before you submit your Pull Request (PR) consider the following guidelines:

1. Search [GitHub](https://github.com/xdanif/db-browser) for an open or closed PR that relates to your submission. You don't want to duplicate effort.
2. Fork the **xdanif/db-browser** repository.
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

9. In GitHub, send a pull request to `db-browser:master`.

That's it! Thank you for your contribution!
