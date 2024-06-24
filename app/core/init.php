<?php
require 'App.php';
require 'config.php';
require 'Controller.php';
require 'Database.php';
require 'Model.php';
require '../vendor/autoload.php';
spl_autoload_register(function($classname){

    require $filename = dirname(__FILE__).'\..\model\\'.$classname.'.php';;
});



//require dirname(__FILE__).'\..\model\User.php';



