#!/usr/bin/env php
<?php
include 'vendor/autoload.php';

use PQuery\Schema;

use Symfony\Component\Console\Application;
$app = new Application();
$app->add(new Schema);
$app->run();




