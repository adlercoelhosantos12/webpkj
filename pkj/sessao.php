<?php
function pkj_sessao_get($campo){
 error_reporting(0);
 ob_start(); 
 session_start();
 $retorno = $_SESSION[$campo];
 error_reporting(-1); 
 return $retorno;
}

function pkj_sessao_set($campo,$valor){
 error_reporting(0);
 ob_start(); 
 session_start();
 $_SESSION[$campo] = $valor;
 error_reporting(-1);
}

function pkj_sessao_info(){
 error_reporting(0);
 session_start();
 $retorno = session_status();
 error_reporting(-1);
 return $retorno;
}

?>
