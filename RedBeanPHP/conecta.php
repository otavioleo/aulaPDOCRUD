<?php
$conexao = new R();
$conexao->setup("mysql:host=localhost;dbname=pdo", "bd_pdo", "pdobdpdo");
// Check connection
if (mysqli_connect_errno()) {
   echo "FALHA NA CONEXÃO: " . mysqli_connect_error();
}
