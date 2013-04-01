<?php
include 'pkj/sessao.php';
include 'pkj/pkj.php';
include 'pkj/componentes.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php
        pkj_import('jquery');
        pkj_import('tema');
        ?>
        <title></title>
    </head>
    <body style="text-align: center">
        <?php
        pkj_sessao_set("nome", "Felipe");
        $i[] = pkj_rotulo("Nome");
        $i[] = pkj_texto("nome");
        $i[] = pkj_botao('salvar', 'Salvar');
        echo pkj_listaHorizontal($i);        
        ?>
        <script>
            function salvar_clicar() {
                var nome = $('#txtnome').val();
                alert('Seu nome é ' + nome);
                alert('Sessão <?=  pkj_sessao_get("nome")?>');
            }
        </script>
        <?php pkj_sessao_destroi(); ?>
    </body>
</html>
<!-- vinganssa -->
