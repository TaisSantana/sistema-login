<?php
session_start();
DELETE FROM usuario WHERE id_usuario = :id
unset($_SESSION['id_usuario'])
header("location: index.php");
?>