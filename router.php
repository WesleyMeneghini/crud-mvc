<?php

$controller = (string) null;
$modo = (string) null;

$controller = $_GET['controller'];
$modo = $_GET['modo'];

// Valida qual a controller será instanciada
switch (strtoupper($controller)){

    case 'CONTATOS':

        require_once('controller/ContatoController.php');

        // Valida qual a ação a ser executada na controller
        switch (strtoupper($modo)){
            case 'NOVO':
                // Instancia da classe ContatoController
                $contatoController = new ContatoController();
                
                // Metodo para inserir um novo contato
                $contatoController->novoContato();
            break;
            case 'EDITAR':
                
                $id = $_GET['id'];
                $contatoController = new ContatoController();
                $contatoController->atualizarContato($id);

            break;
            case 'EXCLUIR':

                // resgata o id
                $id = $_GET['id'];

                // instacia a classe controller
                $contatoController = new ContatoController();

                // metodo para excluir o registro
                $contatoController->excluirContato($id);
            break;
            case 'BUSCAR':

                // resgata o id enviado pela view no click editar
                $id = $_GET['id'];
                // instacia a classe ContatoController
                $contatoController = new ContatoController();
                // metodo para buscar um regitro pelo ID
                $contatoController->buscarContato($id);

            break;
        }
    break;

    case 'USUARIOS':
    break;

    case 'PRODUTOS':
    break;
}