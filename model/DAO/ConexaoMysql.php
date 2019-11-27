<?php

/*
    *Classe para conexão com o banco de dados
    *Autor: Wesley Meneghini
    *Data de Criação: 25/11/2019

    *Modificações:
        Data:
        Alterações realizadas:
        Nome do desenvolvedor:
*/

class ConexaoMysql{
    
    private $server;
    private $user;
    private $password;
    private $database;

    // Construtor da classe
    public function __construct(){

        $this->server="localhost";
        $this->user="root";
        $this->password="bcd127";
        $this->database="dbcontatos20192tb";
    }

    // Método para abrir a conexão com o banco de dados
    public function conectDatabase(){

        try{
            $conexao = new PDO('mysql:host='.$this->server.'; dbname='.$this->database, $this->user, $this->password);
            return $conexao;

        }catch(PDOException $erro){
            echo("Erro ao realizar a conexao com o banco de dados 
                <br> Linha do erro: ". $erro->getLine()."
                <br> Mensagem do erro: ".$erro->getMessage());
        }
    }
}