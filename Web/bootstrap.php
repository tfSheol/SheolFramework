<?php
/**
 * bootstrap.php made by Sheol
 * 28/04/2015 - 14:26
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

const DEFAULT_APP = 'Frontend';

if (!isset($_GET['app']) || !file_exists(__DIR__.'/../App/'.$_GET['app'])) {
    $_GET['app'] = DEFAULT_APP;
}

require_once __DIR__.'/../Lib/Core/SplClassLoader.php';

$coreLoader = new \Core\SplClassLoader('Core', __DIR__.'/../Lib');
$coreLoader->register();

$appLoader = new \Core\SplClassLoader('App', __DIR__.'/..');
$appLoader->register();

$modelLoader = new \Core\SplClassLoader('Model', __DIR__.'/../Lib');
$modelLoader->register();

$entityLoader = new \Core\SplClassLoader('Entities', __DIR__.'/../Lib');
$entityLoader->register();

$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

$app = new $appClass;
$app->run();
