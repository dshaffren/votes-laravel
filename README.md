# Votes

## A small test app.

Deployed using a PHP MVC Framework: Laravel for the purpose of maintainability.

There is a [live demo](http://votes.bitmakr.com) available.

## Relevant Files
- [MySQL tables](build/sql/tables)
- [SQL Query](www/app/models/Vote.php)
- [API Vote Controller](www/app/controllers/VoteController.php)
- [View](www/app/views/hello.blade.php)

## Deployment Instructions

The database generation scripts have been developed outside of Laravel for ease of deployment for our non-Laravel experienced friends.  For a real project we should leverage the framework's migrations system.

To generate a MySQL dump file with all tables and test data:

```
 $ cd build
 $ make
```

The Makefile will generate tables and data available in a single MySQL dump file: ```build/sql/dump.sql```.

The test data can be tweaked by altering the PHP CLI [test data generation script](build/scripts/generate_data.php).

Please be sure to set proper credentials in the Laravel [configuration file](www/app/config/database.php).

Install [composer](https://getcomposer.org/).

Run ```composer install``` in ```www``` to download Laravel dependencies.



