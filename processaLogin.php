<?php
session_start();
//print_r($_REQUEST);
if (!empty($_REQUEST['username']) and ! empty($_REQUEST['password'])) {

   require_once 'RedBeanPHP\rb.php';
   require_once 'RedBeanPHP\conecta.php';

   $username = mysql_real_escape_string($_POST['username']);
   $password = sha1($_POST['password']);
   $sql = "SELECT * FROM usuarios WHERE u_nome = '$username' AND u_senha = '$password'";
   $rows = $conexao->getAll("$sql");
   $numUsers = count($rows);
   if ($numUsers == 1) {
      foreach ($rows as $usuario) {
         $_SESSION['id'] = $usuario['id'];
         $_SESSION['username'] = $usuario['u_nome'];
      }
      header('Location: home.php?consulta=');
      exit();
   } else {
      echo "<p>Nome ou senha invalidos. <a href=\"login.php\">Tente novamente</a></p>";
   }
} else {
   echo "<p>Nome ou senha invalidos. <a href=\"login.php\">Tente novamente</a></p>";
}
