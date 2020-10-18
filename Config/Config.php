<?php namespace Config;

    define('ROOT', str_replace('\\','/',dirname(__DIR__) . "/"));
    
    $base=explode($_SERVER['DOCUMENT_ROOT'],ROOT);
    define("BASE",$base[1]);

    define("API_KEY", "5369ef0cd20290de8110855603705621");

    define("DB_HOST", "localhost");
    define("DB_NAME", "moviepass");
    define("DB_USER", "root");
    define("DB_PASS", "");
    
?>