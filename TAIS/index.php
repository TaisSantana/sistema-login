<?php
    require_once 'classe/usuarios.php';
    $u = new User;    
?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/main.css">
    
</head>

<body>
    
    <div id='corpoform'>
        <h1>Monitoramento de Aglomerações</h1>
        <h1>Entrar </h1>
        <form method="POST" >        
            <input type="email" name ="email" placeholder="Email" required>
            <input type="password" name = "senha" placeholder="Senha" required>
            <input type="submit" value="Entrar">
            <a href="cadastrar.php">Ainda não é inscrito?<Strong>Cadastre-se</strong></a>

        </form>
    </div>
<?php
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']); 
    $u->conectar("projeto_cadastro","localhost","root","");
    if($u->msgErro == "")
    {
        if($u->logar($email,$senha))
        {
            echo "<script>location.href='AreaPrivada.php'</script>";
            //header('Location: AreaPrivada.php');
        }
        else
        {
            ?>
            <div class="msg-erro">
                Email e/ou senha esta(ão) incorretos!        
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
}    
?>

</body>

</html>