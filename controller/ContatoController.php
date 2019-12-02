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

    private $contato;

    public function __construct(){

        require_once('model/Contato.php');
        require_once('model/DAO/ContatoDAO.php');

        // valida se  a requisiçao que esta chegando no method no form e post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Instancia da classe Contato
            $this->contato = new Contato();

            // Guarda nos atributos da classe o post do FORMULARIO
            $this->contato->setNome($_POST['txtnome']);
            $this->contato->setTelefone($_POST['txttelefone']);
            $this->contato->setCelular($_POST['txtcelular']);
            $this->contato->setEmail($_POST['txtemail']);
        }
    }

    public function novoContato(){

        $contatoDao = new ContatoDAO();

        if($contatoDao->insertContato($this->contato)){
            header('location: index.php');
        }else{
            echo "Não foi possivel inserir o registro";
        }

    }

    public function atualizarContato($idContato){
        
        $this->contato->setCodigo($idContato);

        $contatoDAO = new ContatoDAO();

        if($contatoDAO->updateContato($this->contato)){
            header('location: index.php');
            
        }else{
            echo "Não foi possivel atulizar o registro";
        }


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

        $contatoDAO = new ContatoDAO();
        $listaDeContatos = $contatoDAO->selectAllContato();

        return $listaDeContatos;

    }

    public function buscarContato($idContato){

        // instancia da classe DAO do contato
        $contatoDAO = new ContatoDAO();
        // metodo para buscar no banco de dados o registro referente ao ID
        $dadosContato = $contatoDAO->selectByIdContato($idContato);

        require_once "index.php";

    }
}