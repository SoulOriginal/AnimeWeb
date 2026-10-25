# AnimeWeb

A small PHP website from 2020 with two kinds of login: Discord OAuth, and a username and password form backed by MySQL. The home page is a placeholder, and the repository has no commits after 2 July 2020.

## What is in here

- `AnimeWeb/` is the site: `index.php`, `head.php`, `header.php`, `navbar.php`, `login.php`, `register.php` and `views/`.
- `AnimeWeb/login/Discord/` handles "Log in with Discord". It redirects to Discord, exchanges the code for a token, shows the profile data and saves it to a MongoDB collection.
- `AnimeWeb/login/LoginSite/` is a username and password login with registration, a dashboard, account update and removal. It uses MySQL, and `database/pdo.sql` has a table definition.
- `src/css/` and `minireset.css` hold the styles. `minireset.css` is third-party (MIT, see the header in the file).

## Status

Not maintained, and not meant to run as is. It needs PHP, MySQL and the MongoDB PHP driver. The Discord client secret and the MongoDB connection string are placeholders (`YOUR_DISCORD_CLIENT_SECRET` in `AnimeWeb/login/Discord/inc/config.php`, `USER:PASSWORD@HOST` in `AnimeWeb/login/Discord/login.php`).

## Known issues

It is a learning project and has problems I would not ship today:

- SQL in `register.php` and `update.php` is built by string concatenation, so it is open to SQL injection.
- The plain password is kept in `$_SESSION['password']` after login.
- The Discord login stores OAuth tokens unencrypted in MongoDB, and `user.php` prints them on the page.

## History

The commits date from 30 June to 2 July 2020, and some were made by another GitHub user (see the contributors list). Before publishing, the commits that contained real credentials were rewritten with placeholders. Their dates and authors are unchanged.
