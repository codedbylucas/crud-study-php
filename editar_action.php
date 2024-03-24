<?php

include('config.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];

if (isset($id, $nome, $estado, $cidade)) {

    $sql = $pdo->prepare('UPDATE clientes SET nome = :nome, estado = :estado, cidade = :cidade WHERE id = :id');
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':estado', $estado);
    $sql->bindParam(':cidade', $cidade);
    $sql->bindParam(':id', $id);

    if ($sql->execute()) {
        echo "<script>alert('Atualizado com sucesso!'); window.location.href = 'painel.php';</script>";
    } else {
        echo "Erro ao atualizar o registro.";
    }
}