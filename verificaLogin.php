<?php
// iniciar uma sessão
session_start();
 
if (empty($_SESSION['id'])) {
	header('Location: login.php');
	exit();
}
