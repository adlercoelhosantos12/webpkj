<?php

function botao($id, $texto, $clicar = "PADRAO") {
 $clicar = ($clicar == "PADRAO") ? $id . "_clicar();" : $clicar;
 return "<input id='btn" . $id . "' type='button' style='padding:5px;' value='$texto' onclick='setTimeout(function(){ try{ $clicar }catch(e){} },1)' />";
}
function radio($id,$texto,$clicar="PADRAO",$grupo="PADRAO"){
 $clicar = ($clicar == "PADRAO") ? $id . "_clicar();" : $clicar;
  return "<input id='rd" . $id . "' type='radio' name='$grupo' style='padding:5px;' value='$texto' onclick='setTimeout(function(){ try{ $clicar }catch(e){} },1)' />";
  echo '<!-- merda -- >';
 }
function combo($id, $itens, $valoresItens, $texto = "", $mudar = "PADRAO") {
 $retorno = "";
 $mudar = ($mudar == "PADRAO") ? $id . "_mudar();" : $mudar;
 $retorno .= "<select id='cmb" . $id . "' style='padding:5px;' onchange='setTimeout(function(){ try{ $mudar }catch(e){} },1)' >";
 $contador = 0;
 foreach ($itens as $value) {
  $retorno .= "<option value='" . $value . "'>" . $valoresItens[$contador] . "</option>";
  $contador++;
 }
 $retorno .= "</select>";
 return $retorno;
}

function lista($itens, $margem = "5px") {
 $retorno = "";
 $retorno .= "<ul>";
 foreach ($itens as $value) {
  $retorno .= "<li >$value</li>";
 }
 $retorno .= "</ul>";
 return $retorno;
}

function listaVertical($itens, $margem = "5px") {
 $retorno = "";
 $retorno .= "<ul style='list-style-type: none;'>";
 foreach ($itens as $value) {
  $retorno .= "<li style='margin:".$margem."'>$value</li>";
 }
 $retorno .= "</ul>";
 return $retorno;
}

function listaHorizontal($itens, $margem = "5px") {
 $retorno = "";
 $retorno .= "<ul style='list-style-type: none;'>";
 foreach ($itens as $value) {
  $retorno .= "<li style='display:inline;margin:".$margem."'>$value</li>";
 }
 $retorno .= "</ul>";
 return $retorno;
}

?>