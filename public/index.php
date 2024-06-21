<?php
session_start();
require '../app/core/init.php';
//require '../app/model/User.php';
$app = new App();

$app->loadController();
//show(urlExplode());
