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

        if($contatoDao->insertContato($contato)){
            header('location: index.php');
        }else{
            echo "Não foi possivel inserir o registro";
        }

    }

    public function atualizarContato(){

    }

    public function excluirContato($idContato){

        // instancia da classe DAO do contato
        $contatoDAO = new ContatoDAO();

        // metodo para excluir no BD o registro
        if($contatoDAO->deleteContato($idContato)){
            header('location: index.php');
        }else{
            echo "Não foi possivel excluir o registro";
        }

    }

    public function listarContatos(){

        $contatoController = new ContatoDAO();
        $listaDeContatos = $contatoController->selectAllContato();

        return $listaDeContatos;

    }

    public function buscarContato(){

    }
}