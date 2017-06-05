<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'rm-2zezc0373c14mov3ko.mysql.rds.aliyuncs.com'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'nndeal_web'),
            'username' => env('DB_USERNAME', 'nndeal'),
            'password' => env('DB_PASSWORD', 'NNDeal@123456'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => env('DB_PREFIX', 'binli_'),
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '192.168.11.131'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'nndeal_web'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', '123456'),
            'charset' => 'utf8',
            'prefix' => 'binli_',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => env('MONGODB_HOST', '192.168.11.131'),
            'port'     => env('MONGODB_PORT', 27017),
            'database' => env('MONGODB_DATABASE'),
            'username' => env('MONGODB_USERNAME'),
            'password' => env('MONGODB_PASSWORD'),
            'prefix' => 'binli_',
            'options' => [
                'database' => 'admin' // sets the authentication database required by mongo 3
            ]
        ],

        'collect' => [
            'driver'   => 'mongodb',
            'host'     => env('MONGODB_COLLECT_HOST', '192.168.11.131'),
            'port'     => env('MONGODB_COLLECT_PORT', 27017),
            'database' => env('MONGODB_COLLECT_DATABASE'),
            'username' => env('MONGODB_COLLECT_USERNAME'),
            'password' => env('MONGODB_COLLECT_PASSWORD'),
            'prefix' => 'binli_',
            'options' => [
                'database' => 'admin' // sets the authentication database required by mongo 3
            ]
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
