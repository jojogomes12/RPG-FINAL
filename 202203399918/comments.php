<?php
require_once('conn.php');
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: auth.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verificar se o campo de comentário está preenchido
  if (empty($_POST['comment'])) {
    $error = "Por favor, digite um comentário.";
  } else {
    // Obter o comentário
    $comment = $_POST['comment'];

    // Inserir o comentário no banco de dados
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO comments (user_id, comment) VALUES ('$user_id', '$comment')";
    if ($conn->query($query) === true) {
      header("Location: index.php");
      exit;
    } else {
    echo  $error = "Erro ao adicionar o comentário. Por favor, tente novamente.";
    
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
  }
}

// Obter os comentários do usuário atual
$user_id = $_SESSION['user_id'];
$query = "SELECT c.comment, u.* FROM comments c, users u WHERE c.user_id = '$user_id' AND c.user_id = u.id";
$result = $conn->query($query);
$comments = $result->fetch_all(MYSQLI_ASSOC);

?>

  <?php if(!empty($comments)): ?>
    <h3>Seus comentários anteriores:</h3>
    <ul>
      <?php foreach($comments as $comment): ?>
        <li><?php echo $comment['comment']; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <a href="logout.php">Logout</a>
</body>
</html>
