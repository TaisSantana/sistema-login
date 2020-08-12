<?php
    session_start();
    //verifica se sessão existe, se a pessoa não tiver logada, encaminha p tela de login
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        //só executa esse bloco, por causa do exit
        exit;
    }
    else
    {
        /*$id_user = addslashes($_SESSION['id_usuario']); 
        $nome = addslashes($_SESSION['nome']);
        $telefone= addslashes($_SESSION['telefone']);
        $email = addslashes($_SESSION['email']);
        $sql_code = "SELECT * FROM usuario WHERE id_usuario = $_SESSION['id_usuario']";
        $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
        $linha = $sql_query->fetch_assoc();
        */
        
    }
?>


<html>
<head>
    <title>Pagina do Usuario</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/main.css">

</head>
<body>
<section id =Tabela-dados>
    <h1>SEJA BEM VINDO(A)!</h1>
    <table>
        <tr id=titulo>
            <td>Nome</td>
            <td>Telefone</td>
            <td colspan="2">Email</td>
            <td>
                <a href="editar.php">Editar</a>
                <a href="excluir.php">Excluir Conta </a>
                <a href="sair.php">Sair</a>
            </td>
        </tr>
        <tr>
            <td><?php echo "{$_SESSION['nome']}" ?></td>
            <td><?php echo "{$_SESSION['telefone']}" ?></td>
            <td><?php echo "{$_SESSION['email']}" ?></td>
        </tr>
        <section>


</body>
</html>









