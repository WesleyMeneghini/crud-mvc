<?php
/*
    *Classe referente ao objeto Contato
    *Autor: Wesley Meneghini
    *Data de Criação: 25/11/2019

    *Modificações:
        Data:
        Alterações realizadas:
        Nome do desenvolvedor:
*/

class Contato{
    
    private $codigo;
    private $nome;
    private $telefone;
    private $celular;
    private $email;
    
    //Construtor
    public function __construtor(){
        
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }
    
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    
    public function getCelular(){
        return $this->celular;
    }
    
    public function setCelular($celular){
        $this->celular = $celular;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
}