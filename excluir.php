<?php
require_once("verificaLogin.php");
require_once 'RedBeanPHP\rb.php';
require_once 'RedBeanPHP\conecta.php';

$id = $_REQUEST['id'];
if (isset($_POST['submitted'])) {
   processaForm($conexao, $id);
} else {
   showExcluir($conexao, $id);
}

// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showExcluir($conexao, $id) {

   $tabela = $conexao->load('alunos', $id);
   $nome = $tabela->nome;
   $email = $tabela->email;
   $nota = $tabela->nota;

   ?>
   <div>
       <form name="frmAltera" action="excluir.php" method="POST">
           <h2>Crud - PHP - Mysql - Cadastro de Alunos</h2>
           <table>
               <thead>
                   <tr>
                       <th colspan='3'>Exclusão</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>Nome:</td>
                       <td><?php echo $nome; ?>
                           <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                       </td>
                   </tr>                
                   <tr>
                       <td>Email:</td>
                       <td><?php echo $email; ?></td>
                   </tr>                
                   <tr>
                       <td>Nota:</td>
                       <td><?php echo $nota; ?></td>
                   </tr>
               </tbody>
           </table>
           <input type="submit" id="submitted" name="submitted" class="btn btn-primary" value="Excluir">
           <input type='button' id="btsair" name="btsair" value='Voltar' onclick="location.href='home.php?consulta='"/>
       </form>
   </div>
   <?php
}

function processaForm($conexao, $id) {

   $tabela = $conexao->load('alunos', $id);
   $conexao->trash($tabela);

   header('Location: home.php?consulta=');
   exit;
}
