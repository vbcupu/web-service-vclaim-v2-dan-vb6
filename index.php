<?php
require 'vendor/autoload.php';
include 'util.php';
include 'libv.php';

use Slim\Views\PhpRenderer;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\App;
use LZCompressor\LZString as LZString;

$app = new Slim\App();

date_default_timezone_set("Asia/Jakarta");
include 'rute.php';
$app->run();
?>
