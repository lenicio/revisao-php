<?php

/*

  Atividade avaliativa:

  - Implementar a lógica onde apareça na lista o nome da pessoa mais velha e mais nova
    que está no banco de dados.

  Pontuação:
    10% das atividades em sala.

*/

require "./config.php";

$sql = "SELECT * FROM pessoas";
$sql = $pdo->prepare($sql);
$sql->execute();
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

$contMaiorIdade = 0;
$contMenorIdade = 0;

$nomePessoaMaisVelha = "";
$idadePessoaMaisVelha = 0;

foreach ($dados as $linha) {
  $idade = $linha['idade'];

  // Seleciona pessoa mais velha do banco de dados
  if ($idade > $idadePessoaMaisVelha) {
    $idadePessoaMaisVelha = $idade;
    $nomePessoaMaisVelha = $linha['nome'];
  }

  if ($idade >= 18) {
    $contMaiorIdade++;
  } else {
    $contMenorIdade++;
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
  <form action="./adicionarPessoa.php">
    <input type="text" name="nome" placeholder="Informe seu nome...">
    <input type="number" name="idade" placeholder="Informe sua idade..." min=0 max=150>
    <input type="submit" value="Enviar">
  </form>

  <ul>
    <li><?=$contMaiorIdade?> pessoas são maiores de idade.</li>
    <li><?=$contMenorIdade?> pessoas são menores de idade.</li>
    <li><?=$nomePessoaMaisVelha?> é a pessoa mais velha, com <?=$idadePessoaMaisVelha?> anos.</li>
  </ul>
</body>

</html>