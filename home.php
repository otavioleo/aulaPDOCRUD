<?php
require_once("verificaLogin.php");
require_once 'RedBeanPHP\rb.php';
require_once 'RedBeanPHP\conecta.php';

$consulta = $_REQUEST['consulta'];
if (!empty($consulta)) {
   $tabela = $conexao->find('alunos', ' nome LIKE ? ', ["%$consulta%"]);
   if (!count($tabela)) {
      ?>
      <h4>Pesquisa não localizada!</h4>
      <form name="frmVoltar"method="GET" action="home.php?">
          <input type="hidden" id="consulta" name="consulta" value='' />
          <input type="submit" value="Voltar" />
      </form>
      <?php
      exit;
   }
} else {
   $tabela = $conexao->findAll('alunos', 'ORDER BY nome ASC');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Crud - PHP - Mysql</title>
        <style type="text/css">
            #fm{
                margin:0;
                padding:10px 30px;
            }
            .ftitle{
                font-size:14px;
                font-weight:bold;
                color:#666;
                padding:5px 0;
                margin-bottom:10px;
                border-bottom:1px solid #ccc;
            }
            .fitem{
                margin-bottom:5px;
            }
            .fitem label{
                display:inline-block;
                width:80px;
            }
        </style>
    </head>
    <body>
        <h2>Crud - PHP - Mysql - Cadastro de Alunos</h2>
        <table width="500" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <div id="toolbar">
                        <a href="inserir.php" class="easyui-linkbutton" iconCls="icon-add" plain="true" title="Adicionar Aluno">Inclusão de Alunos</a>
                    </div>
                </td>
                <td>
                    <form name="frmPesquisa"method="GET" action="home.php?">
                        <label for="consulta">Pesquisa:</label>
                        <input type="text" id="consulta" name="consulta" value='' maxlength="255" />
                        <input type="submit" value="OK" />
                    </form>
                </td>
                <td>
                    <div id="toolbar">
                        <a href="logout.php" class="easyui-linkbutton" iconCls="icon-add" plain="true" title="Sair do Sistema">Sair</a>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table width="200" border="1" cellspacing="0" cellpadding="0">
            <th>Nome</th>
            <th>Nota</th>
            <th>Nota</th>
            <th>Editar</th>
            <th>Excluir</th>

            <?php
            if (!count($tabela)) {
               die("A tabela está vazia!\n");
            }
            foreach ($tabela as $b) {
               $cid = $b->id;
               print "<tr><td nowrap>";
               echo $b->nome;
               print "</td><td nowrap>";
               echo $b->email;
               print "</td><td>";
               echo $b->nota;
               print "</td><td>";
               print "<a href='alterar.php?id=$cid'>Alterar</a>";
               print '</td><td>';
               print "<a href='excluir.php?id=$cid'>Excluir</a>";
               print "</td></tr>";
            }
            ?>
        </table>
        <br>
        <?php if (!empty($consulta)) { ?>
           <form name="frmVoltar"method="GET" action="home.php">
               <input type="hidden" id="consulta" name="consulta" value='' />
               <input type="submit" value="Voltar" />
           </form>
        <?php } ?>
    </body>
</html>
