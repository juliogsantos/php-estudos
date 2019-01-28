<?php

class GeraLog{

    public static $instance;

    private function __construct() {
        //
    }

    public static function inserirLog($msg){
        date_default_timezone_set("America/Sao_Paulo");
        $dia = date("d/m/Y h:i:sa");
        $registro = $dia . " - " . $msg . "\n";
        $log = fopen("log.txt", "a");
        fwrite($log, $registro);
        fclose($log);
        echo "log gerado";
    }

    public static function getInstance() {
        if(isset(self::$instance)){
          return self::$instance;
        }
        self::$instance = new GeraLog();
        return self::$instance;
    }
}