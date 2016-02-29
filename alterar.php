<?php
require_once("verificaLogin.php");
require_once 'RedBeanPHP\rb.php';
require_once 'RedBeanPHP\conecta.php';

$id = $_REQUEST['id'];
if (isset($_POST['submitted'])) {
   processaForm($conexao, $id);
} else {
   showAlterar($conexao, $id);
}

// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showAlterar($conexao, $id) {

   $tabela = $conexao->load('alunos', $id);
   $nome = $tabela->nome;
   $email = $tabela->email;
   $nota = $tabela->nota;
   ?>
   <div>
       <form name="frmAltera" action="alterar.php" method="POST">
           <h2>Crud - PHP - Mysql - Cadastro de Alunos</h2>
           <table>
               <thead>
                   <tr>
                       <th colspan='3'>Alteração</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>Nome:</td>
                       <td><input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
                           <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                       </td>
                   </tr>                
                   <tr>
                       <td>Email:</td>
                       <td><input type="text" id="email" name="email" value="<?php echo $email; ?>"></td>
                   </tr>                
                   <tr>
                       <td>Nota:</td>
                       <td><input type="text" id="nota" name="nota" value="<?php echo $nota; ?>"></td>
                   </tr>
               </tbody>
           </table>
           <input type="submit" id="submitted" name="submitted" class="btn btn-primary" value="Salvar">
           <input type='button' id="btsair" name="btsair" value='Voltar' onclick="location.href='home.php?consulta='"/>
       </form>
   </div>
   <?php
}

function processaForm($conexao, $id) {
   $tabela = $conexao->load('alunos', $id);

   $tabela->nome = $_POST['nome'];
   $tabela->email = $_POST['email'];
   $tabela->nota = $_POST['nota'];
   $conexao->store($tabela);
   $submmitted = $_POST['submitted'];

   header('Location: home.php?consulta=');
   exit;
}
