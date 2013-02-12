<?php

include 'conf.php';

function pkj_arrayToSQL($dados, $tabela, $campos) {
    return arrayToSQL($dados, $tabela, $campos);
}

function arrayToSQL($dados, $tabela, $campos) {
    $sqls;
    for ($i = 0; $i < count($dados); $i++) {
        $sql = "insert into $tabela (";
        for ($j = 0; $j < count($campos); $j++) {
            if ($j == (count($campos) - 1)) {
                $sql .= $campos[$j] . ") ";
            } else {
                $sql .= $campos[$j] . ",";
            }
        }
        $sql .= "values(";
        for ($j = 0; $j < count($campos); $j++) {
            if ($j == (count($campos) - 1)) {
                $sql .= "'" . $dados[$i][$j] . "') ";
            } else {
                $sql .= "'" . $dados[$i][$j] . "',";
            }
        }
        $sqls[$i] = $sql;
    }
    return $sqls;
}

function pkj_geraCRUD($resultado, $paginaRemover, $paginaAtualizar, $scriptTerminado = "location.reload()") {
    geraCRUD($resultado, $paginaRemover, $paginaAtualizar, $scriptTerminado = "location.reload()");
}

function geraCRUD($resultado, $paginaRemover, $paginaAtualizar, $scriptTerminado = "location.reload()") {
    if (count($resultado) <= 0) {
        echo "<div class='col_12' style='text-align:center' >Nada encontrado</div>";
        return false;
    }
    echo "<table style='width:100%'>";
    $campos = array_keys($resultado[0]);
    echo "<thead>\n<tr>\n";
    foreach ($campos as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>\n</thead>\n";
    echo "<tbody>\n";
    foreach ($resultado as $linha) {
        echo "<tr>\n";
        $contador = 0;
        foreach ($linha as $coluna) {
            if ($campos[$contador] == "id") {
                echo "<td> " . $coluna . "</td>\n";
            } else {
                echo "<td><input type='text' id='table" . $campos[$contador] . $linha['id'] . "'  style='width:100%' value='" . $coluna . "' /></td>\n";
            }

            $contador++;
        }
        echo "
   <td style='width:12.5%;'>
   <input type='button' value='Remover' style='width:100%' onclick=\"$.get('$paginaRemover',{'id':'" . $linha['id'] . "'},function(dados){ $scriptTerminado })\" /> 
   </td>";

        echo "
   <td style='width:12.5%;'>
   <input type='button' value='Atualizar' style='width:100%' onclick=\"$.get('$paginaAtualizar',{";
        $contador = 0;
        foreach ($campos as $value) {
            if ($value != "id") {//proibe id
                if ($contador == (count($campos) - 1)) {
                    echo "'$value':$('#table" . $value . $linha['id'] . "').val()";
                } else {
                    echo "'$value':$('#table" . $value . $linha['id'] . "').val(),";
                }
            }//proibe id
            $contador++;
        }
        echo ",'id':'" . $linha['id'] . "'},function(dados){ $scriptTerminado })\" /> 
   </td>";
        echo "</tr>\n";
    }
    echo "</tbody>";
    echo "</table>";
}

function pkj_geraTable($resultado) {
    geraTable($resultado);
}

function geraTable($resultado) {
    if (count($resultado) <= 1) {
        echo "<div class='col_12' style='text-align:center' >Nada encontrado</div>";
        return false;
    }
    echo "<table style='width:100%'>";
    $campos = array_keys($resultado[0]);
    echo "<thead>\n<tr>\n";
    foreach ($campos as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>\n</thead>\n";
    echo "<tbody>\n";
    foreach ($resultado as $linha) {
        echo "<tr>\n";
        foreach ($linha as $coluna) {
            echo "<td>" . $coluna . "</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</tbody>";
    echo "</table>";
}

function pkj_query($comando, $atributos = null, $oo = true) {
    return query($comando, $atributos = null, $oo = true);
}

function query($comando, $atributos = null, $oo = true) {
    return executa($comando, $atributos, $oo);
}
function pkj_executa($comando, $atributos = null, $oo = false) {
    return executa($comando, $atributos = null, $oo = false);
}
function executa($comando, $atributos = null, $oo = false) {
//converte o bidimencional do get ou post em unidimencional 
    $qtd = count($atributos);
    if ($qtd > 0) {
        $contador = 0;
        foreach ($atributos as $value) {
            $atributos[$contador] = $value;
            $contador++;
        }
        //error_reporting(0);
        $precompilado = "";
        $arr = explode("?", $comando);
        $indice = 0;
        error_reporting(0);
        for ($index = 0; $index < (count($arr) - 1 ); $index++) {
            $precompilado .= $arr[$index] . "'" . addslashes($atributos[$index]) . "'";
            $indice = $index;
        }
        $comando = $precompilado . $arr[$indice + 1];
    }
    $conf = new conf();
    $query = null;
    switch ($conf->getServidor()) {
        case "mysql":
            $query = mysql_query($comando, $conf->pkj_bd_sis_conexao);
            break;
        case "postgree":
            $query = pg_query($comando);
            break;
        case "mssql":
            $query = odbc_exec($conf->pkj_bd_sis_conexao, $comando);
            break;
    }
    $retorno = array();
//
//echo "bd.php > ".$comando."\r\n";
//
    $select = explode(" ", $comando);
    if ($select[0] == "select") {
        switch ($conf->getServidor()) {
            case "mysql":
                while ($row = ($oo) ? mysql_fetch_object($query) : mysql_fetch_assoc($query)) {
                    $retorno[] = $row;
                }
                break;
            case "postgree":
                while ($row = ($oo) ? pg_fetch_object($query) : pg_fetch_assoc($query)) {
                    $retorno[] = $row;
                }
                break;
            case "mssql":
                while ($row = ($oo) ? odbc_fetch_object($query) : odbc_fetch_array($query)) {
                    $retorno[] = $row;
                }
                break;
        }
        return $retorno;
    } else {
        return $query;
    }
}

?>