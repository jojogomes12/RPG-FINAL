<?php  require_once('templates/header.php');
require_once('conn.php');

?>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Bem vindo ao dangeon time!</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Feito em dia 25 de abril de 2023,  Por João Pedro Gomes</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">RPG</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Novidades</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="img/Capturar.png" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">Sobreviva nesse mundo hostil e faça novos recordes e combos</p>
                            <p class="fs-5 mb-4">O universo desse jogo é baseado em um mundo medieval de fantasia onde suas escolhas por mais  simples fazem a diferença.</p>
                            <p class="fs-5 mb-4">Se você quiser saber mais fique por dentro de nossas redes socias e emails onde você sabera exatamente tudo que estamos fazendo.</p>
                            <h2 class="fw-bolder mb-4 mt-5">"Eu não tive escolha se não lutar"</h2>
                            <p class="fs-5 mb-4">Nossa historia se baseia em um dos 5 personagens do reino de eldina , Cada um com suas motivações e habilidades especias.Todos tem um motivo por querer explorar a dangeon, cabe a você torna-los dignos ou não de desbravarem o perigo</p>
                        </section>
                    </article>
                   <!-- Comments section -->
<!-- Comments section -->
<section class="mb-5">
    <div class="card bg-light">
        <div class="card-body">
            <!-- Comment form -->
            <?php if(isset($_SESSION['username'])): ?>
                <form class="mb-4" method="post" action="comments.php">
                    <textarea class="form-control" rows="3" placeholder="Junte-se a nós e deixe seu comentário!" name="comment"></textarea>
                    <button type="submit" class="btn btn-primary">Comentar</button> 
                </form>
            <?php else: ?>
                <p>Para comentar, faça login ou registre-se. <a href="auth.php">Aqui</a></p>
            <?php endif; ?>
            
            <!-- Comment with nested comments -->
            <div class="d-flex flex-column align-items-start">
                <!-- Parent comment -->
                <?php 
                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT c.comment, u.* FROM comments c, users u WHERE c.user_id = '$user_id' AND c.user_id = u.id";
                    $result = $conn->query($query);
                    $comments = $result->fetch_all(MYSQLI_ASSOC);
                }
                ?>
                
                <?php if(!empty($comments)): ?>
                    <?php foreach($comments as $comment): ?>
                        <?php
                            if($comment['Image'] == "") {
                                $image = $comment['Image'] = "user.png";
                            } else {
                                $image = $comment['Image'];
                            }
                        ?>
                        <div class="d-flex mt-4">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="img/<?= $image ?>" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold"><?php echo $comment['username']; ?></div>
                                <?= $comment['comment']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
        
                
            </div>
        </div>
    </div>
</section>


                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Procurar</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Digite oque deseja buscar..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Ir!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categorias</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Tático</a></li>
                                        <li><a href="#!">Drama</a></li>
                                        <li><a href="#!">Ação</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Html</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Ultimas Noticias</div>
                        <div class="card-body">Teste nosso game gratuitamente online <a href="RPG/index.html">clicando aqui! </a> </div>
                    </div>
                </div>
            </div>
            <?php  require_once('templates/footer.php') ?>