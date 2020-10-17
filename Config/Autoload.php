<?php namespace Config;

class Autoload {
     public static function start() {
          spl_autoload_register(function($classNotFound)
          {
               $url = ROOT . str_replace("\\", "/", $classNotFound)  . ".php";
               $url = strtolower($url);
               include_once($url);
          });
     }
}