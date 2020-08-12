<?php
//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
//Apagando todos os dados de uma sessão:
session_unset();
?>