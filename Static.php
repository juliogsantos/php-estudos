<?php

class Statico{
    public static $instance;

    private function __construct() {
        
    }

    public static function teste(){
       
        echo "estático";
    }

    public static function getInstance() {
        if(!isset(self::$instance)){
        self::$instance = new Statico();
        return self::$instance;
        //   return self::$instance;
        }
        // self::$instance = new Statico();
        return self::$instance;
    }
}