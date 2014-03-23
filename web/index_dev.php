<?php
ini_set('display_errors', 1);
use Symfony\Component\Debug\Debug;

require_once __DIR__.'/../vendor/autoload.php';

Debug::enable();

$app = require __DIR__.'/../app/app.php';
require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../src/controller.php';
$app->run();
?>
