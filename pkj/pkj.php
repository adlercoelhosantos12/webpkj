<?php

function importPHP($nome) {
    pkj_importPHP($nome);
}

function pkj_importPHP($nome) {
    include 'pkj/php/' . $nome . '/' . $nome . '.php';
}

function pkj_import($elemento) {
    import($elemento);
}

/**
 * Coloque essa função dentro 
 * @param type $elemento Pode variar conforme o que vai importar
 * jquery = jquery
 * marcara = jquery mask e jquery maskmoney
 * webcam = jquery webcam
 * slider = nivo slider
 * tema = tema da 99lime kickstart
 * movel = jquery mobile
 */
function import($elemento) {
    switch ($elemento) {
        case "jquery":
            echo "<script type='text/javascript' src='pkj/jquery-1.8.2.js' ></script>";
            echo "<script type='text/javascript' src='pkj/ui/js.js' ></script><link rel='stylesheet' href='pkj/ui/css.css' >";
            echo "<script type='text/javascript' src='pkj/util.js' ></script>";
            break;
        case "mascara":
            echo "<script type='text/javascript' src='pkj/mask.js' ></script><script type='text/javascript' src='pkj/maskMoney.js' ></script>";
            break;
        case "webcam":
            echo "<script type='text/javascript' src='pkj/as3/jquery.webcam.as3.js' ></script>";
            break;
        case "slider":
            echo "<script type='text/javascript' src='pkj/slider/jquery.nivo.slider.js' ></script><link rel='stylesheet' href='pkj/slider/nivo-slider.css' ><link rel='stylesheet' href='pkj/slider/themes/default/default.css' >";
            break;
        case "tema":
            echo "<script type='text/javascript' src='pkj/tema/kickstart.js' ></script><script type='text/javascript' src='pkj/tema/prettify.js' ></script><link rel='stylesheet' href='pkj/tema/kickstart.css' ><link rel='stylesheet' href='pkj/tema/prettify.css' ><link rel='stylesheet' href='pkj/tema/tiptip.css' >";
            break;
        case "movel":
            echo "<script type='text/javascript' src='pkj/mobile/jquery.mobile-1.2.0.min.js' ></script><link rel='stylesheet' href='pkj/mobile/jquery.mobile.structure-1.2.0.min.css' ><link rel='stylesheet' href='pkj/mobile/jquery.mobile.theme-1.2.0.min.css' >";
            break;
        case "tiny":
            echo "<script type='text/javascript' src='pkj/tiny/tiny_mce.js' ></script>";
            break;
        default:
            echo "<script type='text/javascript' >alert('Não entendi :(');</script>";
            break;
    }
}

function pkj_webcamHTML($id) {
    webcamHTML($id);
}

function webcamHTML($id) {
    echo "<div style='width: 640px;height: 480px;overflow;auto;' id='$id'>";
}

function pkj_webcamJS($id) {
    webcamJS($id);
}

function webcamJS($id) {
    $valor = "  
   $('#$id').webcam({
     swffile: 'base/as3/sAS3Cam.swf',
     previewWidth: 640,
     previewHeight: 480,

     resolutionWidth: 640,
     resolutionHeight: 480,
     cameraEnabled:  function () {
      var cameraApi = this;
      setTimeout(function() { cameraApi.setCamera(0); }, 200);      
     }    
    }); 
";
    echo $valor;
}
function pkj_sliderHTML($id, $imagens){
    sliderHTML($id, $imagens);
}
function sliderHTML($id, $imagens) {
    echo "<div class='slider-wrapper theme-default'><div id='$id' class='nivoSlider'>";
    for ($index = 0; $index < count($imagens); $index++) {
        echo "<img src=" . $imagens[$index] . " />";
    }
    echo "</div></div>";
}
function pkj_sliderJS($id){
    pkj_sliderJS($id);
}
function sliderJS($id) {
    echo "$('#$id').nivoSlider();\n";
}
function pkj_formulario($nomes){
    formulario($nomes);
}
function formulario($nomes) {
    for ($index = 0; $index < count($nomes); $index++) {
        echo "<div class='col_2'>";
        echo strtoupper(substr($nomes[$index], 0, 1)) . substr($nomes[$index], 1);
        echo "</div>";
        echo "<div class='col_10'>";
        echo "<input type='" . (($nomes[$index] == "senha") ? "password" : "text") . "' style='width:100%;' name='$nomes[$index]' id='txt$nomes[$index]' />";
        echo "</div>";
    }
}
pkj_utf8_encode($lista){
    return utf8_array_encode($lista);
}
function utf8_array_encode($array){
 utf8_encode_deep($array);
 return $array;
}
function utf8_encode_deep(&$input) {
     if (is_string($input)) {
         $input = utf8_encode($input);
     } else if (is_array($input)) {
         foreach ($input as &$value) {
             utf8_encode_deep($value);
         }

         unset($value);
     } else if (is_object($input)) {
         $vars = array_keys(get_object_vars($input));

         foreach ($vars as $var) {
             utf8_encode_deep($input->$var);
         }
     }
 }
?>
