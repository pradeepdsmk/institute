# Institute

## Purpose
This application is made for Training Institutes to keep track of their students and fee payments and view reports.


## Technologies
Institute is a PHP application developed using [CodeIgniter framework](http://codeigniter.com). Plain Javascript is used for front-end validations and magic.


## Setup
Clone the project and run `composer update`

Open `app/Database/Seeds/db.sql` in text editor and follow the instructions in it.

Point your Apache virtual host to this project's `public` folder

Copy the file `env` to `.env` and tailor for your app, specifically the `baseURL`
and any `database` settings. Refer [codeigniter's environment variables](https://codeigniter4.github.io/userguide/general/configuration.html#environment-variables-and-codeigniter) configuration if you have any doubts.


## Important Notes: index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the CodeIgniter's user guide for a better explanation of how CI4 works!


## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)


##License

Institute is free and distributed under MIT License. For full details, read the copy of the MIT License found in the file named LICENSE.
