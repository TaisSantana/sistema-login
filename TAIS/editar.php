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
<div id='corpoformcad'>
    
    <form method="POST">
        <h1> Alterar </h1>
        <input type="text" name ="nome" placeholder="Nome" maxlength= "70" required value = "<?php echo $_SESSION['nome'];?>">>
        <input type="text" name ="telefone" placeholder="Telefone" maxlength= "11" required value = "<?php echo $_SESSION['telefone'];?>">
        <input type="email" name ="email" placeholder="Email" maxlength= "40" requiredvalue = "<?php echo $_SESSION['email'];?>">
        <input type="password" name ="senha" placeholder="Senha" maxlength= "32" required value = "<?php echo $_SESSION['senha'];?>">>
        <input type="password" name ="confsenha" placeholder="Confirmar Senha" maxlength= "70"required>
        <input type="submit" value="Editar">
    </form>
    </div>



<?php

    if(isset($_POST['nome']))
    {   
        $nome = addslashes($_POST['nome']);
        $telefone= addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confsenha']);
    

    $u->conectar("projeto_cadastro","localhost","root","");
    #se  não tiver mensagem de erro, podemos prosseguir com o cadastro.
    if($u->msgErro == "")
    {
        if($senha == $confirmarSenha)
        {
            
            if($u->alterar($_SESSION['id_usuario'],$nome,$telefone,$email,$senha))
            {
                ?>
                <div id="msg-sucesso">
                <a>Alterado com sucesso!</a>
                </div>
                
                <?php
                header('Location: AreaPrivada.php');
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
                Senha e Confirmar senha não correspondem!        
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