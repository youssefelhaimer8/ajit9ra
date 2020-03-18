<?php
//ob_start();
session_start();

require_once __DIR__.'/../core/config.php';
require_once __DIR__.'/../app/inter/interdata.php';

//session_destroy();
spl_autoload_register(function($name){
    require_once  __DIR__."/../classes/{$name}.class.php";
});
 
$school= new school();
$login = new login();
$site='http://localhost/school';
 setcookie('show',1, time()+ (10 * 365 * 24 * 60 * 60));
 

 if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
         $ip = $_SERVER['REMOTE_ADDR'];
        }
        @$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip"));
        $city = $geo["geoplugin_city"];
        $region = $geo["geoplugin_regionName"];
        $country = $geo["geoplugin_countryName"];
