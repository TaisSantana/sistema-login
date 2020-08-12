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

    <div id='corpoformcad'>
    
        <form method="POST">
            <h1>Cadastrar </h1>
            <input type="text" name ="nome" placeholder="Nome" maxlength= "70" required>
            <input type="text" name ="telefone" placeholder="Telefone" maxlength= "11" required>
            <input type="email" name ="email" placeholder="Email" maxlength= "40" required>
            <input type="password" name ="senha" placeholder="Senha" maxlength= "32" required>
            <input type="password" name ="confsenha" placeholder="Confirmar Senha" maxlength= "70"required>
            <input type="submit" value="Cadastrar">
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
            //se o metodo cadastrar retornar verdadeiro, então cadastrou com sucesso.
            if($u->cadastrar($nome,$telefone,$email,$senha))
            {
                ?>
                <div id="msg-sucesso">
                <a href="index.php" >Cadastrado com sucesso! <strong>Clique aqui</strong> para logar!</a> 
                </div>
                <?php
            }
            else
            {
                ?>
                <div class="msg-erro">
                    Email já cadastrado
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