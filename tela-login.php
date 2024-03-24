<?php
include('config.php');

//Função para verificar se existe a variavel e-mail e senha.

//isset = se existir e-mail ou existir senha                                        
if(isset($_POST['email']) || isset($_POST['senha'])){
    // strlen = quantidade de caracteres 
    if(strlen($_POST['email']) == 0){
        $mensagemAlerta1 = "Preencha seu email";
        echo "<script>alert('$mensagemAlerta1');</script>";
    } else if(strlen($_POST['senha']) == 0){
        $mensagemAlerta2 = "Preencha sua senha";
        echo "<script>alert('$mensagemAlerta2');</script>";
    } else {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'");  // Sem placeholders
        $sql->execute();  // Sem array de parâmetros
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        

        //Verifica a quantidade de registros que a consulta acima retornou para saber se o usuario existe
        $quantidade = $sql->rowCount();
        if($quantidade == 1) {

            //Se não exister sessão
            if(!isset($_SESSION)){
                //Começar nova sessão
                session_start();
            }

            $_SESSION['email'] = $results['email'];
            $_SESSION['senha'] = $results['senha'];

            //Redirecionar usuario para painel.php
            header("Location: painel.php");

            
            
            //$mensagemAlerta3 = "E-mail ou senha incorretos";
            //echo "<script>alert('$mensagemAlerta3');</script>";
            
        } else {
            $mensagemAlerta3 = "E-mail ou senha incorretos";
            echo "<script>alert('$mensagemAlerta3');</script>";
        }
        
    }
        
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="POST" class="tp">
            <div class="form-group">
                <label for="email">Endereço de email</label>
                <input type="email" class="form-control" placeholder="Digite seu email" name="email">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" placeholder="Digite sua senha" name="senha">
            </div>
            <input type="submit" name="submit" value="Acessar" class="button">  
            
        </form>
    </div>


</body>
</html>