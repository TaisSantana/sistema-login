<?php

Class User
{

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha){
        global $msgErro; global $pdo;
        try{
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);}
        catch (PDOException $e){
            $msgErro = $e->getMessage(); 
        }

    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        //Já existe email? se sim, entrar
        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        //se campo id existir, a pessoa esta cadastrada, então retorna falso.
        if($sql->rowCount() > 0)
        {
            return false;
        }
        //se não, cadastrar
        else
        {
            $sql = $pdo->prepare("INSERT INTO usuario (nome,telefone,email,senha) VALUES (:n,:t,:e,:s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            //criptografa senha
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }
    }
    public function logar($email,$senha)
    {
        global $pdo;
        //verificar se email e senha estão cadastrados
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        //se o select retornar id, então é criado um array com os dados
        if($sql->rowCount() > 0)
        {//logado com sucesso
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            $_SESSION['nome'] = $dado['nome'];
            $_SESSION['telefone'] = $dado['telefone'];
            $_SESSION['email'] = $dado['email'];

            return true;
        } 
        else
        {//não loga 
            return false;
        }
       
        
    }
    
    public function buscarDados($id_usuario)
    {
        $res = array();
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
        $sql->bindValue(":id",$id_usuario);
        $sql->execute();
        $res = $sql->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function alterar($id_usuario,$nome, $telefone, $email, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE usuario SET nome = :n,telefone=:t,email=:e,senha=:s) WHERE id_usuario = :id");
            $sql->bindValue(":id",$id_usuario);
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            //criptografa senha
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        
    }
    

    public function deletar($id_usuario)
    {
        $sql = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = :id");
        $sql->bindValue(":id",$id_usuario);
        $sql->execute();
    }
}
?>

