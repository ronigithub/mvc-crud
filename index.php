<?php

spl_autoload_register(function($class){

	include_once "system/libs/".$class.".php";
});
	include_once "app/config/config.php";

$main = new Main();

?>