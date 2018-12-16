## GUILLAUME MAURIN 7000971
Github : https://github.com/guillaumeMECE/php-reservation

## About upload pictures
The upload is blind in the code for a maximum size of 4Mo but this depend of the php.ini file.
The attribute upload_max_filesize must be set to 4M and post_max_size equal or more than 4Mo.
So the maximum is 4Mo depending of the php.ini maximum value.

## Installation

Create a database *login* and the table *users* via the SQL statements in the `_install` folder.
Change mySQL database user and password in `config/db.php` (*DB_USER* and *DB_PASS*).

## Password_compatibility_library.php
* @author Anthony Ferrara <ircmaxell@php.net>
* @license http://www.opensource.org/licenses/mit-license.html MIT License
* @copyright 2012 The Authors
