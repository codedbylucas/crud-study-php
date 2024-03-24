<?php

include 'config.php';

$id = $_GET['id'];

$sql = $pdo->prepare('DELETE FROM clientes WHERE id = :id');
$sql->bindParam(':id', $id);
$sql->execute();

header('Location:painel.php');