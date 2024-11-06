<?php

spl_autoload_register(function($path) {
    // echo $path;

    require_once(str_replace('\\', '/', $path).'.php'); //str_replace 비끌 문자열

}); //Route/Route.php