<?php

class conf {

//configuração
    var $servidor = "mysql";
    var $endereco = "localhost";
    var $usuario = "root";
    var $senha = "";
    var $base = "will";
//Sistema
    var $pkj_bd_sis_conexao = null;
    var $pkj_bd_sis_tipo = null;

    function __construct($servidor = "mysql", $endereco = "localhost", $usuario = "root", $senha = "", $base = "test") {
        $this->servidor = ($this->servidor == "") ? $servidor : $this->servidor;
        $this->endereco = ($this->endereco == "") ? $endereco : $this->endereco;
        $this->usuario = ($this->usuario == "") ? $usuario : $this->usuario;
        $this->senha = ($this->senha == "") ? $senha : $this->senha;
        $this->base = ($this->base == "") ? $base : $this->base;

        switch ($this->servidor) {
            case "mysql":
                $this->pkj_bd_sis_conexao = mysql_connect($this->endereco, $this->usuario, $this->senha);
                mysql_select_db($this->base, $this->pkj_bd_sis_conexao);
                break;
            case "postgree":
                $this->pkj_bd_sis_conexao = pg_connect("host=$this->endereco user=$this->usuario password=$this->senha dbname=$this->base");
                break;
            case "mssql":
                echo "Em testes";
                $this->pkj_bd_sis_conexao = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$this->endereco;Database=$this->base;", $this->usuario, $this->senha);
                break;
        }
    }

    public function getServidor() {
        return $this->servidor;
    }

    public function setServidor($servidor) {
        $this->servidor = $servidor;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getBase() {
        return $this->base;
    }

    public function setBase($base) {
        $this->base = $base;
    }

    public function getPkj_bd_sis_conexao() {
        return $this->pkj_bd_sis_conexao;
    }

    public function setPkj_bd_sis_conexao($pkj_bd_sis_conexao) {
        $this->pkj_bd_sis_conexao = $pkj_bd_sis_conexao;
    }

    public function getPkj_bd_sis_tipo() {
        return $this->pkj_bd_sis_tipo;
    }

    public function setPkj_bd_sis_tipo($pkj_bd_sis_tipo) {
        $this->pkj_bd_sis_tipo = $pkj_bd_sis_tipo;
    }

}

?>
