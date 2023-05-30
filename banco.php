

<?php
//php -S localhost:1000

//Aqui está um exemplo de como você pode usar PHP para conectar seu código HTML e CSS a um banco de dados MySQL:

// Primeiro, você precisará criar um banco de dados MySQL e uma tabela para armazenar seus dados.

// Em seguida, você pode usar a função "mysqli_connect" do PHP para se conectar ao banco de dados:php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "diariodigital";

// Cria a conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checa a conexão
if (!$conn) {
  die("Conexão falhou: " . mysqli_connect_error());
}
?>

<?php

//Depois que você se conectar ao banco de dados, poderá executar consultas SQL para inserir, atualizar ou recuperar dados do
 //banco de dados. Por exemplo, se você quiser inserir dados de um formulário HTML em uma tabela do banco de dados,
 //pode usar o seguinte código:


// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtém os valores do formulário
  $nome = $_POST["Nick"];
  $email = $_POST["senha"];
  $mensagem = $_POST["mensagem"];

  // Insere os valores na tabela do banco de dados
  $sql = "INSERT INTO mensagens (Nick, senha, mensagem) VALUES ('$nome', '$email', '$mensagem')";
  if (mysqli_query($conn, $sql)) {
    echo "Mensagem enviada com sucesso!";
  } else {
    echo "Erro ao enviar mensagem: " . mysqli_error($conn);
  }
}
?>

<?php

// Por fim, você pode usar o PHP para recuperar os dados do banco de dados e exibi-los em seu código HTML. Por exemplo:
// Recupera as mensagens da tabela do banco de dados
$sql = "SELECT * FROM mensagens";
$result = mysqli_query($conn, $sql);

// Exibe as mensagens em uma tabela HTML
echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["email"] . "</td><td>" . $row["mensagem"] . "</td></tr>";
}
echo "</table>";
?>
