<?php
function get($campo){
 error_reporting(0);
 ob_start(); 
 session_start();
 $retorno = $_SESSION[$campo];
 error_reporting(-1); 
 return $retorno;
}

function set($campo,$valor){
 error_reporting(0);
 ob_start(); 
 session_start();
 $_SESSION[$campo] = $valor;
 error_reporting(-1);
}

function info(){
 error_reporting(0);
 session_start();
 $retorno = session_status();
 error_reporting(-1);
 return $retorno;
}

?>
