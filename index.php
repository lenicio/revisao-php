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

$maiorIdade = 0;
$maiorIdadeNome = "";

$menorIdade = PHP_INT_MAX;
$menorIdadeNome = "";

foreach ($dados as $key => $linha) {
  $idade = $linha['idade'];

  // Esta condicional armazena a maior idade da lista
  if ($idade > $maiorIdade) {
    $maiorIdade = $idade;
    $maiorIdadeNome = $linha['nome'];
  }

  // Esta condicional armazena a menor idade da lista
  if ($idade < $menorIdade) {
    $menorIdade = $idade;
    $menorIdadeNome = $linha['nome'];
  }


  if($linha['idade'] >= 18) {
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
    <li><?=$maiorIdadeNome?> é a pessoa mais velha, com <?=$maiorIdade?> anos.</li>
    <li><?=$menorIdadeNome?> é a pessoa mais nova, com <?=$menorIdade?> anos.</li>
  </ul>
</body>

</html>