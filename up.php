<?php

require "./config.php";

$sql = "CREATE TABLE IF NOT EXISTS pessoas 
(
  id INTEGER PRIMARY KEY,
  nome TEXT NOT NULL,
  idade INTEGER NOT NULL
)";

$sql = $pdo->prepare($sql); 
$sql->execute();
