<?php
require "importUsuario.php";

class UsuarioController{

    private $daoUsuario;

    public function __construct() {
        self::daoUsuario = new DaoUsuario();
    }

    public function salvar(Usuario $usuario){
        self::daoUsuario->salvar($usuario);
    }

}