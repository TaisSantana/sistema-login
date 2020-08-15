<?php
    session_start();
    //verifica se sessão existe, se a pessoa não tiver logada, encaminha p tela de login
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }
    else
    {
?>
<html>
<head>
    <title>Pagina do Usuario</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/main.css">

</head>
<body>
<div id =Tabela-dados>
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
        <tr id=infos>
            <td><?php echo "{$_SESSION['nome']}" ?></td>
            <td><?php echo "{$_SESSION['telefone']}" ?></td>
            <td><?php echo "{$_SESSION['email']}" ?></td>
        </tr>
</div>


</body>
</html>

<?php
    }
?>







