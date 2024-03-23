<?php

include 'config.php';

$sql = ('SELECT * FROM clientes');
$result = $pdo->query($sql);

// Obtendo os resultados da consulta


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!--Quando o usuario estiver logado será encaminhado para essa pagina-->
    <div>
        <h1>Clientes Cadastrados</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dados = $result->fetch(PDO::FETCH_ASSOC)){?>
                        <tr>
                            <td><?php echo $dados['id'] ?></td>
                            <td><?php echo $dados['nome'] ?></td>
                            <td><?php echo $dados['estado'] ?></td>
                            <td><?php echo $dados['cidade'] ?></td>
                            <td>
                                <a href="" class="btn btn-primary">Editar</a>
                                <a href=""class="btn btn-danger">Remover</a>
                            </td>
                        </tr> 
                <?php }?>
            </tbody>
        </table>

        <a href="cadastro-cliente.php" class="btn btn-success">Novo cliente</a>
        <a href="logout.php" class="btn btn-danger" >Sair</a>
    </div>
    
     
</body>
</html>