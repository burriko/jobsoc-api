<?php

return [

    'connection' => [
        'driver'   => 'pdo_mysql',
        'host'     => getenv('DB_HOST'),
        'user'     => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'dbname'   => getenv('DB_DATABASE'),
    ]

];