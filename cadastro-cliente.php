<?php 

include 'config.php';

if(isset($_POST['nome']) || isset($_POST['estado']) || isset($_POST['cidade'])){
    // strlen = quantidade de caracteres 
    if(strlen($_POST['nome']) == 0){
        $mensagemAlerta1 = "Preencha seu nome";
        echo "<script>alert('$mensagemAlerta1');</script>";
    } else if(strlen($_POST['estado']) == 0){
        $mensagemAlerta2 = "Preencha seu estado";
        echo "<script>alert('$mensagemAlerta2');</script>";
    } else if(strlen($_POST['cidade']) == 0){
        $mensagemAlerta3 = "Preencha sua cidade";
        echo "<script>alert('$mensagemAlerta3');</script>";
    } else {

        $nome = $_POST['nome'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];

        print_r("$nome");
        print_r("$estado");
        print_r("$cidade");

        $sql = $pdo->prepare ("INSERT INTO `clientes`(`nome`, `estado`, `cidade`) VALUES ('$nome','$estado','$cidade')");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            echo "<script>alert('Cadastrado com sucesso!'); window.location.href = 'painel.php';</script>";
          } else {
            echo "Erro ao cadastrar cliente.";
          }
            
        } 
    }
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de cliente</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

    
    <div class="container">
        <h1>Cadastro de clientes</h1>
        <form method="POST" class="tp" action="">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" placeholder="Digite seu nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" placeholder="Digite seu estado" name="estado" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" placeholder="Digte sua cidade" name="cidade" required>
            </div>
            <input type="submit" name="submit" value="Cadastrar" class="btn btn-success">
            <a href="painel.php" class="btn btn-primary">Voltar</a>
        </form>
    </div>
</body>
</html>