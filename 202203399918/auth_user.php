<?php
session_start();

require_once('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type'])) {
  if ($_POST['type'] === 'register') {
    // Registro de usuário
    // Verificar se os campos estão preenchidos
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
      $error = "Por favor, preencha todos os campos.";
    } else {
      // Obter os dados do formulário
      $username = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Hash da senha (opcional)
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Verificar se o usuário já existe
      $query = "SELECT * FROM users WHERE username = '$username'";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
        $error = "Nome de usuário já existente. Por favor, escolha outro.";
      } else {
        // Inserir novo usuário no banco de dados
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        if ($conn->query($query) === true) {
          $_SESSION['user_id'] = $conn->insert_id;
          $_SESSION['username'] = $username;
          header("Location: index.php");
          exit;
        } else {
          $error = "Erro ao criar o usuário. Por favor, tente novamente.";
        }
      }
    }
  } elseif ($_POST['type'] === 'login') {
    // Login do usuário
    // Verificar se os campos estão preenchidos
    if (empty($_POST['email']) || empty($_POST['password'])) {
      $error = "Por favor, preencha todos os campos.";
    } else {
      // Obter os dados do formulário
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Verificar se o usuário existe no banco de dados
      
$query = "SELECT * FROM users WHERE Email = '$email'";
$result = $conn->query($query);
if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();
  if (isset($user['Password']) && password_verify($password, $user['Password'])) {
    $_SESSION['user_id'] = $user['ID'];
    $_SESSION['username'] = $user['username'];
    header("Location: index.php");
    exit;
  } else {
    $error = "Senha incorreta. Por favor, tente novamente.";
 print($error);
  }
} else {
  $error = "Usuário não encontrado. Por favor, verifique seu email.";
  echo $error;
}

    }
  }
}

$conn->close();
?>
