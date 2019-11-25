<?php
/*
    *Classe para 
    *Autor: Wesley Meneghini
    *Data de Criação: 25/11/2019

    *Modificações:
        Data:
        Alterações realizadas:
        Nome do desenvolvedor:
*/

class ContatoController{

    public function __construct(){

        require_once('model/Contato.php');
        require_once('model/DAO/ContatoDAO.php');

    }

    public function novoContato(){

        // Instancia da classe Contato
        $contato = new Contato();

        // Guarda nos atributos da classe o post do FORMULARIO
        $contato->setNome($_POST['txtnome']);
        $contato->setTelefone($_POST['txttelefone']);
        $contato->setCelular($_POST['txtcelular']);
        $contato->setEmail($_POST['txtemail']);

        $contatoDao = new ContatoDAO();

        $contatoDao->insertContato($contato);

    }

    public function atualizarContato(){

    }

    public function excluirContato(){

    }

    public function listarContato(){

    }

    public function buscarContato(){

    }
}