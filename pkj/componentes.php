<?php

function pkj_botao($id, $texto, $clicar = "PADRAO") {
    $clicar = ($clicar == "PADRAO") ? $id . "_clicar();" : $clicar;
    return "<input id='btn" . $id . "' type='button' style='padding:5px;' value='$texto' onclick='setTimeout(function(){ try{ $clicar }catch(e){} },1)' />";
}

function pkj_radio($id, $texto, $clicar = "PADRAO", $grupo = "PADRAO") {
    $clicar = ($clicar == "PADRAO") ? $id . "_clicar();" : $clicar;
    return "<input id='rd" . $id . "' type='radio' name='$grupo' style='padding:5px;' value='$texto' onclick='setTimeout(function(){ try{ $clicar }catch(e){} },1)' />";
}

function pkj_combo($id, $itens, $valoresItens, $texto = "", $mudar = "PADRAO") {
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

function pkj_lista($itens, $margem = "5px") {
    $retorno = "";
    $retorno .= "<ul>";
    foreach ($itens as $value) {
        $retorno .= "<li >$value</li>";
    }
    $retorno .= "</ul>";
    return $retorno;
}

function pkj_listaVertical($itens, $margem = "5px") {
    $retorno = "";
    $retorno .= "<ul style='list-style-type: none;'>";
    foreach ($itens as $value) {
        $retorno .= "<li style='margin:" . $margem . "'>$value</li>";
    }
    $retorno .= "</ul>";
    return $retorno;
}

function pkj_listaHorizontal($itens, $margem = "5px") {
    $retorno = "";
    $retorno .= "<ul style='list-style-type: none;'>";
    foreach ($itens as $value) {
        $retorno .= "<li style='display:inline;margin:" . $margem . "'>$value</li>";
    }
    $retorno .= "</ul>";
    return $retorno;
}

function pkj_rotulo($texto = "", $link = "", $id = "") {
    $retorno = "";
    if ($link != "") {
        $retorno = "<a id='$id' href='$link' >$texto</a>";
    } else {
        $retorno = "<span id='$id'>$texto</span>";
    }
    return $retorno;
}

function pkj_texto($id, $clicar = "PADRAO", $texto = "") {
    $clicar = ($clicar == "PADRAO") ? $id . "_clicar();" : $clicar;
    return "<input id='txt" . $id . "' type='text' style='padding:5px;' value='$texto' onclick='setTimeout(function(){ try{ $clicar }catch(e){} },1)' />";
}

function pkj_campo($id, $texto, $clicar = "PADRAO") {
    $retorno = "";
    $clicar = ($clicar == "PADRAO") ? $id . "_clicar();" : $clicar;
    $retorno .= pkj_rotulo($texto);
    $retorno .= pkj_texto($id, $clicar);
    return $retorno;
}

?>