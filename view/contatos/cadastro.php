<?php
  // var_dump($dadosContato);

  $botao = (string) "salvar";
  $action = (string) "router.php?controller=contatos&modo=novo";

  if(isset($_GET['modo'])){

    if(strtoupper($_GET['modo']) == 'BUSCAR'){

      $codigo = $dadosContato->getCodigo();
      $nome = $dadosContato->getNome();
      $telefone = $dadosContato->getTelefone();
      $celular = $dadosContato->getCelular();
      $email = $dadosContato->getEmail();

      $botao = "editar";
      $action = "router.php?controller=contatos&modo=editar&id=".$codigo;
    }
  }
  // echo $nome;
?>


<div id="cadastro">
  <form name="frmcontatos" method="post" action="<?=$action?>">
    <table id="tblcadastro">
      <tr>
        <td colspan="2" class="titulo_tabela">Cadastro de Contatos</td>
      </tr>
      <tr>
        <td class="tblcadastro_td">Nome:</td>
        <td><input placeholder="Digite seu nome"  name="txtnome" type="text" value="<?=@$nome?>" onkeypress="return validarEntrada(event,'numeric');" required   /></td>
      </tr>
      <tr>
        <td class="tblcadastro_td">Telefone:</td>
        <td><input id="telefone" placeholder="Ex:999 9999-9999"   name="txttelefone" type="text" value="<?=@$telefone?>" onkeypress="return mascaraFone(this, event);" required  /></td>
      </tr>
      <tr>
        <td class="tblcadastro_td">Celular:</td>
        <td><input id="celular" name="txtcelular" type="text" value="<?=@$celular?>" required /></td>
      </tr>
      <tr>
        <td class="tblcadastro_td">Email:</td>
        <td><input name="txtemail" type="email" value="<?=@$email?>" required  /></td>
      </tr>
      <tr>
        <td><input name="btnsalvar" type="submit" value="<?=$botao?>" /></td>
        <td></td>
      </tr>
    </table>
  </form>
</div>
        
<div id="consulta">
  <table id="tblconsulta">
    <tr>
      <td class="titulo_tabela" colspan="6">Consulta de Contatos</td>
    </tr>
    <tr class="tblcadastro_td">
      <td>Nome</td>
      <td>Telefone</td>
      <td>Celular</td>
      <td>Email</td>
      <td>Opções</td>
    </tr>
      
    <?php

      require_once('controller/ContatoController.php');
      $contatoController = new ContatoController();
      $listaDados = $contatoController->listarContatos();

      $cont = 0;

      while($cont < count($listaDados)){

    ?> 
  
    <tr class="tblconsulta_dados">
      <td><?=$listaDados[$cont]->getNome()?></td>
      <td><?=$listaDados[$cont]->getTelefone()?></td>
      <td><?=$listaDados[$cont]->getCelular()?></td>
      <td><?=$listaDados[$cont]->getEmail()?></td>

      <td>
        <a href="router.php?controller=contatos&modo=buscar&id=<?=$listaDados[$cont]->getCodigo()?>">
          <img src="view/icones/Modify16.png">
        </a>
        | 
        <a href="router.php?controller=contatos&modo=excluir&id=<?=$listaDados[$cont]->getCodigo()?>">
          <img src="view/icones/Delete16.png">
        </a>
        | 
        <img src="view/icones/consulta.png" width="24" height="24">
      </td>
    </tr>
    
    <?php
      $cont++;
      }
    ?>

  
  </table>
</div>    
