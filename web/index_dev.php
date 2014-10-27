<?php
ini_set('display_errors', 1);

use Symfony\Component\Debug\Debug;
Debug::enable();

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../app/app.php';
require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../src/controller.php';
$app->run();
?>
