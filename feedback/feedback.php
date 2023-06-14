<?php
// Conexão com o banco de dados
$servername = "127.0.0.1:3306";
$username = "root";
$password = "123456";
$dbname = "diariodigital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se o formulário de exclusão foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['usuario_id'])) {
        $anotacaoId = $_POST['usuario_id'];

        // Executar a consulta de exclusão no banco de dados
        $sql = "INSERT FROM Feedback WHERE id = $anotacaoId";
        $conn->query($sql);
      }
}

// Consultar Feedback
$sql = "SELECT idFeedback, feed FROM Feedback";
$result = $conn->query($sql);

// Verificar se há resultados e armazenar em um array
$anotacoes = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $anotacoes[] = $row;
    }
}


// Fechar conexão com o banco de dados
$conn->close();
?>


<!DOCTYPE html>
<htmzl lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Dark Mode</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" type="image/png" href="favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Barra de navegação -->
  <nav>
    <div class="logo">
      <a href="feedback.html" >feedback</a>
    </div>
    <ul class="nav-links">
    <li><a href="../Login/login.php">Login</a></li>
      <li><a href="../home.php">Home</a></li>
      <li><a href="../feedback/feedback.php">Feedback</a></li>
      <li><a href="../anotacoes=/Anotacoes.php">Anotacoes</a></li>
    </ul>
    </ul>
  </nav>

  <!-- Conteúdo -->
  <section class="login">
    <h2>Mandar mensagem para o Suporte</h2>
    <form>
    
        <textarea name="" id="" cols="30" rows="10" class = 'textarea'></textarea>
      </div>
      <button class="btn-login" type="submit">Enviar</button>
    </form>
  </section>
</body>
</html>

