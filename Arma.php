<?php

class Arma {

    private $tipo;
    private $calibre;
    private $municao;
    private $status;

    public function __construct($tipo, $calibre, $municao, $status){
        $this->tipo = $tipo;
        $this->calibre = $calibre;
        $this->municao = $municao;
    }

    public function atirar(){
        if($this->municao !== 0){
            echo $this->municao; 
            echo "pow!";
            $this->municao = $this->municao - 1;
            
        }else{
            $this->status = "descarregado";
            echo $this->status;
        }
    
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getCalibre(){
        return $this->calibre;
    }

    public function setCalibre($calibre){
        $this->calibre = $calibre;
    }

    public function getMunicao(){
        return $this->municao = $municao;
    }

    public function setMunicao($municao){
        $this->municao = $municao;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

}

