# Techphin 

[![Build Status](https://travis-ci.org/andela-joyebanji/Techphin.svg?branch=develop)](https://travis-ci.org/andela-joyebanji/Techphin)
 [![Coverage Status](https://coveralls.io/repos/github/andela-joyebanji/Techphin/badge.svg?branch=develop)](https://coveralls.io/github/andela-joyebanji/Techphin?branch=develop)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-joyebanji/Techphin/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/andela-joyebanji/Techphin/?branch=develop)

[Techphin](https://techphin.herokuapp.com) is a learning platform that is open to people interested in the latest technologies online (Youtube hosted videos).

To share content you can conveniently register with your favourite social network [Facebook, Github or Twitter]. Non-
registered users can also use the site without much restrictions.

##Features
- Login and registration
- Viewing videos by Category
- Sharing videos
  - Creating new video
  - Update of videos
  - Delete video
- Profile View
- Profile Update


##Installation
It is recommended that you have the following set up on your local environment before getting started

1. [Composer](https://getcomposer.org)
2. [Laravel] (https://laravel.com)
3. [Vagrant] (https://www.vagrantup.com) 
4. [Postgres](http://www.postgresql.org)
5. [Git] (https://git-scm.com)

You can install the application by forking this repo or cloning it to your desktop. 

```bash
$ git clone git@github.com:andela-joyebanji/Techphin.git
```

Change your directory into `techphin`

```bash
$ cd techphin
```

After cloning the application
you have to set your environments variables, the required ones for the application are below:

```bash
APP_ENV=local
APP_DEBUG=true
APP_KEY=
APP_URL=

DB_HOST=
DB_PORT=5432
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

CACHE_DRIVER=
SESSION_DRIVER=
QUEUE_DRIVER=

REDIS_HOST=
REDIS_PASSWORD=
REDIS_PORT=

MAIL_DRIVER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=

GITHUB_APP_ID=
GITHUB_APP_SECRET=
GITHUB_CALLBACK_URL=

FACEBOOK_ID=
FACEBOOK_SECRET=
FACEBOOK_URL=

TWITTER_ID=
TWITTER_SECRET=
TWITTER_URL=

CLOUDINARY_API_KEY=
CLOUDINARY_API_SECRET=
CLOUDINARY_CLOUD_NAME=
```
Run Composer install to install the vendor packages

```bash
$ composer install
```

Run Migration:

```artisan
    php artisan migrate --seed
```

Boot-up the app with 

```bash
$ php artisan serve
```

## Security

If you discover any security related issues, please email [Oyebanji Jacob](oyebanji.jacob@andela.com) or create an issue.

## Credits

[Oyebanji Jacob](https://github.com/andela-joyebanji)

## License

### The MIT License (MIT)

Copyright (c) 2016 Oyebanji Jacob <oyebanji.jacob@andela.com>

> Permission is hereby granted, free of charge, to any person obtaining a copy
> of this software and associated documentation files (the "Software"), to deal
> in the Software without restriction, including without limitation the rights
> to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
> copies of the Software, and to permit persons to whom the Software is
> furnished to do so, subject to the following conditions:
>
> The above copyright notice and this permission notice shall be included in
> all copies or substantial portions of the Software.
>
> THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
> IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
> FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
> AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
> LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
> OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
> THE SOFTWARE.
