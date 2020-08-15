<?php
    session_start();
    require_once 'classe/usuarios.php';
    $u = new User; 
       
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
<?php 
$u->conectar("projeto_cadastro","localhost","root","");
#se  não tiver mensagem de erro, podemos prosseguir com o cadastro.
    if($u->msgErro == "")
    {

            if($u->deletar($_SESSION['id_usuario']))
            {
                ?>
                <div id="msg-sucesso">
                <a>Alterado com sucesso!</a>
                </div>
                
                <?php
                header('Location: index.php');
            }
            else
            {
                ?>
                <div class="msg-erro">
                    Esse email já está cadastrado!
                </div>
                <?php 
            }
    }
        
    
    else
    {
        ?>
        <div class="msg-erro">      
        <?php echo "Erro: ".$u->msgErro; ?>
        </div>
        <?php
    }

?>
</body>

</html>