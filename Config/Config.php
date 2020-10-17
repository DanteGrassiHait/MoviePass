<?php namespace Config;

    define('ROOT', str_replace('\\','/',dirname(__DIR__) . "/"));

    $base=explode($_SERVER['DOCUMENT_ROOT'],ROOT);
    define("BASE",$base[1]);

    define("API_KEY", "ae9900442d74cd24d2505bc66ade31fc");

    define("DB_HOST", "localhost");
    define("DB_NAME", "moviepass");
    define("DB_USER", "root");
    define("DB_PASS", "");
    
?>