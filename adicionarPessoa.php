<?php

if (!empty($_GET['nome']) && !empty($_GET['idade'])) {
  require "./config.php";

  $nome = $_GET['nome'];
  $idade = $_GET['idade'];
  
  $sql = "INSERT INTO pessoas (nome, idade) VALUES (:nome, :idade)";
  $sql = $pdo->prepare($sql);
  $sql->bindValue(":nome", $nome);
  $sql->bindValue(":idade", $idade);
  $sql->execute();
}

header("Location: index.php");