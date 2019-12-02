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
        require_once('model/Contato.php');

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
            return true;
        }else{
            return false;
        }
    }

    // Atualiza um contato
    public function updateContato(){
        
    }

    // Exclui um contato
    public function deleteContato($idContato){

        $sql = "delete from tblcontatos where codigo=".$idContato.";";

        if($this->conexao->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    // Seleciona todos os contatos
    public function selectAllContato(){

        $sql = "select * from tblcontatos;";

        $select = $this->conexao->query($sql);

        $cont = (int) 0;


        while($rsSelect = $select->fetch(PDO::FETCH_ASSOC)){

            // Intancia da classe Contato, criandouma conleçao de objetos
            $listContato[] = new Contato();

            $listContato[$cont]->setCodigo($rsSelect['codigo']);
            $listContato[$cont]->setNome($rsSelect['nome']);
            $listContato[$cont]->setTelefone($rsSelect['telefone']);
            $listContato[$cont]->setCelular($rsSelect['celular']);
            $listContato[$cont]->setEmail($rsSelect['email']);

            $cont ++;
        }
        
        return $listContato;

    }

    // Seleciona um contato pelo ID
    public function selectByIdContato(){
        
    }

}