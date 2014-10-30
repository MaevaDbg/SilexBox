<?php
ini_set('display_errors', 1);

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Debug\Debug;
Debug::enable();

$app = require __DIR__.'/../app/app.php';
require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../src/controller.php';
$app->run();
?>
