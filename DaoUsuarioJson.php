<?php
require "GeraLog.php";

class DaoUsuarioJson {   

private $arquivo;

public function __construct() {
    if(!file_exists ("usuario.json")){
       $this->arquivo = fopen("usuario.json", "w");
       fwrite($this->arquivo, "[\n");
        
    }
}

public function inserir($txt) {
    try {

        $this->arquivo = fopen("usuario.json", "a");
        fwrite($this->arquivo, $txt."\n");
        fclose($this->arquivo);
        
    } catch (Exception $e) {
        echo "catch";
        GeraLog::getInstance()->inserirLog($e->getMessage());
    }
}

public function Editar(Usuario $usuario) {
    try {
        $sql = "UPDATE usuario set
            nome = :nome,
            email = :email,
            senha = :senha,
            ativo = :ativo,
            cod_perfil = :cod_perfil WHERE cod_usuario = :cod_usuario";

        $p_sql = Conexao::getInstance()->prepare($sql);

        $p_sql->bindValue(":nome", $usuario->getNome());
        $p_sql->bindValue(":email", $usuario->getEmail());
        $p_sql->bindValue(":senha", $usuario->getSenha());
        $p_sql->bindValue(":ativo", $usuario->getAtivo());
        $p_sql->bindValue(":cod_perfil", $usuario->getCod_perfil());
        $p_sql->bindValue(":cod_usuario", $usuario->getCod_usuario());

        return $p_sql->execute();
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, foi gerado
um LOG do mesmo, tente novamente mais tarde.";
        GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
    }
}

public function Deletar($cod) {
    try {
        $sql = "DELETE FROM usuario WHERE cod_usuario = :cod";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":cod", $cod);

        return $p_sql->execute();
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, foi gerado
um LOG do mesmo, tente novamente mais tarde.";
        GeraLog::getInstance()->inserirLog("Erro! Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
    }
}

public function BuscarPorCOD($cod) {
    try {
        $sql = "SELECT * FROM usuario WHERE cod_usuario = :cod";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":cod", $cod);
        $p_sql->execute();
        return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, foi gerado
um LOG do mesmo, tente novamente mais tarde.";
        GeraLog::getInstance()->inserirLog("Erro! Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
    }
}
private function populaUsuario($row) {
    $pojo = new Usuario();
    $pojo->setCod_usuario($row['cod_usuario']);
    $pojo->setNome($row['nome']);
    $pojo->setEmail($row['email']);
    $pojo->setSenha($row['senha']);
    $pojo->setAtivo($row['ativo']);
    $pojo->setPerfil(ControllerPerfil::getInstance()->BuscarPorCOD($row['cod_perfil']));
    return $pojo;
}

}

?>