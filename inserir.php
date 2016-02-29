<?php
require_once("verificaLogin.php");
require_once 'RedBeanPHP\rb.php';
require_once 'RedBeanPHP\conecta.php';

if (isset($_POST['submitted'])) {
   processaForm($conexao);
} else {
   showIncluir();
}

// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showIncluir() {

   ?>
   <div>
       <form name="frmInserir" action="inserir.php" method="POST">
           <table>
               <thead>
                   <tr>
                       <th colspan='3'>Inclusão</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>Nome:</td>
                       <td><input type="text" id="nome" name="nome" value="" required="true">
                       </td>
                   </tr>                
                   <tr>
                       <td>Email:</td>
                       <td><input type="text" id="email" name="email" value="" required="true"></td>
                   </tr>                
                   <tr>
                       <td>Nota:</td>
                       <td><input type="text" id="nota" name="nota" value="" validType="email"></td>
                   </tr>
               </tbody>
           </table>
           <input type="submit" id="submitted" name="submitted" class="btn btn-primary" value="Incluir">
           <input type='button' id="btsair" name="btsair" value='Voltar' onclick="location.href='home.php?consulta='"/>
       </form>
   </div>
   <?php
}

function processaForm($conexao) {

      $tabela = $conexao->dispense('alunos');

   $tabela->nome = $_POST['nome'];
   $tabela->email = $_POST['email'];
   $tabela->nota = $_POST['nota'];
   $conexao->store($tabela);
   $submmitted = $_POST['submitted'];

   header('Location: home.php?consulta=');
   exit;
}
