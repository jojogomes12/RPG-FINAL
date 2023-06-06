<?php  require_once('templates/header.php') ?>

<div class="container py-5">
        <h1 class="text-center mb-4">Editar Perfil</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form>
                    <div class="mb-3">
                        <label for="profile-img" class="form-label">Imagem de Perfil</label>
                        <input type="file" class="form-control" id="profile-img">
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">Biografia</label>
                        <textarea class="form-control" id="bio" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <div class="col-lg-6">
                <img src="img/user.png" alt="Imagem de Perfil" width="100px" class="profile-img">
            </div>
        </div>
    </div>

<?php  require_once('templates/footer.php') ?>
