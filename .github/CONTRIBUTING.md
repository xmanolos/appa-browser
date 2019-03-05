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

To run the development application run it with Docker Compose: `docker-compose up -d`

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
