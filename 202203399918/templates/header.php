<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Joarts-Dangeon Time</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assers/relogio.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!"><img src="relogio.png" alt=""> Dungeon Time</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Sobre</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contato</a></li>
                        <?php if(isset($_SESSION['username'])): ?>
                            <li class="nav-item"><a class="nav-link" href="profile.php"><?= $_SESSION['username'] ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="auth.php">Entrar/Cadastrar</a></li>
                            <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5" >