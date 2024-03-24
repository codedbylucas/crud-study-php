<?php 

include 'config.php';

$id = $_GET['id'];

if(isset($_GET['id'])){
    $sql = $pdo->prepare('SELECT * FROM clientes WHERE id = :id');
    $sql->bindParam(':id', $id);
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
} ?>

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
        <h1>Alterar cadastro</h1>
        <form method="POST" class="tp" action="editar_action.php">
            <input type="hidden" name='id' value="<?=$result[0]['id'];?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" placeholder="Digite seu nome" name="nome" value="<?=$result[0]['nome'];?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" placeholder="Digite seu estado" name="estado" value='<?=$result[0]['estado'];?>' required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" placeholder="Digte sua cidade" name="cidade" value='<?=$result[0]['cidade'];?>' required>
            </div>
            <input type="submit" name="submit" value="Alterar" class="btn btn-success">
            <a href="painel.php" class="btn btn-primary">Voltar</a>
        </form>
    </div>
</body>
</html>   
