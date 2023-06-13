<?php
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

// Função para criar uma nova anotação
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nova_anotacao"])) {
  $anotacao = $_POST["nova_anotacao"];

  // Escapa o valor para prevenir injeção de SQL
  $anotacao = mysqli_real_escape_string($login, $anotacao);

  // Insere a nova anotação no banco de dados
  $sql = "INSERT INTO Anotacoes (grenciamento, usuario_id, usuario_nick) VALUES ('$anotacao', 1, 'Pedro')";
  $resultado = mysqli_query($login, $sql);

  if ($resultado) {
    echo "Anotação criada com sucesso.";
  } else {
    echo "Erro ao criar a anotação: " . mysqli_error($login);
  }
}

// Função para obter todas as anotações existentes
$sql = "SELECT * FROM Anotacoes WHERE usuario_id = 1 AND usuario_nick = 'Pedro'";
$resultado = mysqli_query($login, $sql);
$anotacoes = [];

if ($resultado && mysqli_num_rows($resultado) > 0) {
  while ($row = mysqli_fetch_assoc($resultado)) {
    $anotacoes[] = $row;
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
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
      <a href="home.html">Home</a>
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
    <h2>Diario</h2>
    <form action="" method="POST" style="width: 400px; height: 640px;padding: 0;">
      <textarea class = 'textarea' name="nova_anotacao" id="" cols="30" rows="10" ></textarea>
      <button class="btn-login" type="submit">Salvar Anotação</button>
    </form>
    <div class="anotacoes">

      
    </div>
  </section>
</body>
</html>