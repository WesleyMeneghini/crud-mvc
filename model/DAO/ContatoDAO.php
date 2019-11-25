<?php
/*
    *Classe para Integração com o banco de dados
    *Autor: Wesley Meneghini
    *Data de Criação: 25/11/2019

    *Modificações:
        Data:
        Alterações realizadas:
        Nome do desenvolvedor:
*/



class ContatoDAO{

    private $conexaoMysql;
    private $conexao;

    public function __construct(){

        require_once('ConexaoMysql.php');

        // Instancia da classe de conexao com o BD
        $this->conexaoMysql = new ConexaoMysql();

        // Abre a conexao com o banco de dados e guarda no atributo conexao
        $this->conexao = $this->conexaoMysql->conectDatabase();
    }

    // Inseri um novo contato
    public function insertContato(Contato $contato){
        
        $sql = "insert into tblcontatos(nome, telefone, celular, email) values(?,?,?,?);";

        $statement = $this->conexao->prepare($sql);

        $statementDados = array(
            $contato->getNome(),
            $contato->getTelefone(),
            $contato->getCelular(),
            $contato->getEmail()
        );
        

        if($statement->execute($statementDados)){
            echo("Registro inserido com sucesso!");
        }else{
            echo("Erro ao executar o script no BD!");
        }
    }

    // Atualiza um contato
    public function updateContato(){
        
    }

    // Exclui um contato
    public function deleteContato(){
        
    }

    // Seleciona todos os contatos
    public function selectAllContato(){
        
    }

    // Seleciona um contato pelo ID
    public function selectByIdContato(){
        
    }

}