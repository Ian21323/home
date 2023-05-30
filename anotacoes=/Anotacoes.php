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

// Consulta as anotações
$sql = "SELECT id, grenciamento FROM anotacoes";
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
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visualizar Anotações - Dark Mode</title>
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
      <li><a href="../login/Anotacoes.php">Anotacoes</a></li>
    </ul>
  </nav>

  <!-- Conteúdo -->
  <section class="anotacoes">
    <h2>Anotações</h2>
    <div class="lista-anotacoes">
      <?php foreach($anotacoes as $anotacao): 
        ?>
        <div class="anotacao">
          <p><?php echo $anotacao['grenciamento']; ?></p>
          <div class="botoes">
            <button class="btn-visualizar">Visualizar</button>
            <form action="" method="POST" class="form-excluir">
              <input type="hidden" name="anotacao_id" value="<?php echo $anotacao['id']; ?>">
              <button class="btn-excluir" type="submit">Excluir</button>
                <?php 
                  myslq 
                ?>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <script>
    const formsExcluir = document.querySelectorAll('.form-excluir');

    formsExcluir.forEach(form => {
      form.addEventListener('submit', (event) => {
        const confirmacao = confirm("Tem certeza que deseja excluir esta anotação?");

        if (!confirmacao) {
          event.preventDefault();
        }
      });
    });
  </script>
</body>
</html>