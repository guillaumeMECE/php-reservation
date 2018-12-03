#About upload pictures
The upload is blind in the code for a maximum size of 4Mo but this depend of the php.ini file.
The attribute upload_max_filesize must be set to 4M and post_max_size equal or more than 4Mo.
So the maximum is 4Mo depending of the php.ini maximum value.

## Requirements

- PHP 5.3.7+
- MySQL 5 database (please use a modern version of MySQL (5.5, 5.6, 5.7) as very old versions have a exotic bug that
[makes PDO injections possible](http://stackoverflow.com/q/134099/1114320).
- activated mysqli (last letter is an "i") extension (activated by default on most server setups)

## Installation

Create a database *login* and the table *users* via the SQL statements in the `_install` folder.
Change mySQL database user and password in `config/db.php` (*DB_USER* and *DB_PASS*).
