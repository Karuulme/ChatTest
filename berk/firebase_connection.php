<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('chat-application-380806148-firebase-adminsdk-ks2e0-84c8293f3f.json')
    ->withDatabaseUri('https://chataplication-ee6c9-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();




