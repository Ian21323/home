<?php
//php -S localhost:3000 -t home/
 // 
//Aqui está um exemplo de como você pode usar PHP para conectar seu código HTML e CSS a um banco de dados MySQL:

// Primeiro, você precisará criar um banco de dados MySQL e uma tabela para armazenar seus dados.

// Em seguida, você pode usar a função "mysqli_connect" do PHP para se conectar ao banco de dados:php

$servername = "127.0.0.1:3306";
$username = "root";
$password = "123456";
$dbname = "diariodigital";

// Cria a conexão
$login = mysqli_connect($servername, $username, $password, $dbname);

// Checa a conexão
if (!$login) {
  die("Conexão falhou: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtém os valores do formulário
  $nome = $_POST["nick"];
  $senha = $_POST["senha"];

  // Escapa os valores para prevenir injeção de SQL
  $nome = mysqli_real_escape_string($login, $nome);
  $senha = mysqli_real_escape_string($login, $senha);

  // Executa a consulta SQL
  $sql = "SELECT * FROM usuario WHERE nick = '$nome' AND senha = '$senha'";
  $resultado = mysqli_query($login, $sql);

// Verifica se a consulta retornou resultados
if ($resultado && mysqli_num_rows($resultado) > 0) {
  // Usuário existe, redireciona para a página 'home'
  header("Location: /home.php");
  exit();
} else {
  // Usuário não existe, derruba o servidor
  exit();
}
}

?>
<!DOCTYPE html>
<htmzl lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Dark Mode</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" type="image/png" href="favicon.png">
</head>
<body>
  <!-- Barra de navegação -->
  <nav>
    <div class="logo">
      <a href="login.html">Login</a>
    </div>
    <ul class="nav-links">
    <li><a href="../Login/login.php">Login</a></li>
      <li><a href="../home.php">Home</a></li>
      <li><a href="../feedback/feedback.php">Feedback</a></li>
      <li><a href="../anotacoes=/Anotacoes.php">Anotacoes</a></li>
    </ul>
  </nav>

  <!-- Conteúdo -->
  <section class="login">
    <h2>Login</h2>
    <form action = "" method = "POST">
      <div class="input-field">
        <label for="username">Usuario:</label>
        <input type="text" id="nick" name="nick" required>
      </div>
      <div class="input-field">
        <label for="senha">Senha:</label>
        <input type="senha" id="senha" name="senha" required>
      </div>
      <button class="btn-login" type="submit">Entrar</button>
    </form>
  </section>
</body>
</html>



