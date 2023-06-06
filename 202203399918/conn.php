<?php
 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dangeon_time";

  // Conectar ao banco de dados
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
  }

