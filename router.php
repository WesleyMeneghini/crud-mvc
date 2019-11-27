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
            case 'ATUALIZAR':
            break;
            case 'EXCLUIR':
            break;
        }
    break;

    case 'USUARIOS':
    break;

    case 'PRODUTOS':
    break;
}