<?php

$db = require(__DIR__ . '/db.php');
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=mysql.hostinger.es;dbname=u664353887_ecolp';

return $db;

/*
$db = require(__DIR__ . '/db.php');
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=localhost;dbname=ecolpets';

return $db;
*/