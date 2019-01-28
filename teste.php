<?php
require "Arma.php";
// require "Usuario.php";
// require "DaoUsuarioJson.php";

// $ub = new Usuario();
// $ub2 = new Usuario();
// $ud = new DaoUsuarioJson();

// $ub->setNome("Fulano");
// $ub->setEmail("fulano@detal.com");
// $ub->setSenha("Fulano123");
// $ub->setAtivo(true);
// $ub->setPerfil("comum");

// $ud->inserir($ub->toString()."\n");

// $ub2->setNome("Fulano2");
// $ub2->setEmail("fulano@detal.com2");
// $ub2->setSenha("Fulano1232");
// $ub2->setAtivo(true);
// $ub2->setPerfil("comum2");

// $ud->inserir($ub2->toString()."\n");

// $json = Array('nome'=> $ub->getNome(), 'email'=>$ub->getEmail(), 'senha'=>$ub->getSenha(), 'ativo'=>$ub->getAtivo(), 'perfil'=>$ub->getPerfil());
// if($ud->inserir(json_encode($json))){
     // echo $ub->getNome() ." ". $ub->getEmail()." ".$ub->getSenha()." ".$ub->getAtivo()." ".$ub->getPerfil() ;
    // echo json_encode(var_dump($ub), JSON_PRETTY_PRINT);
// }else{
//     echo "Algo de errado ocorreu!";
// }

$EspingardaCal12 = new Arma("Espingarda", 12, 7, "carregado");
while($EspingardaCal12->getStatus() != "descarregado" ){
    $EspingardaCal12->atirar();
}
// $EspingardaCal12->atirar();


