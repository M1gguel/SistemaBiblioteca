<?php

  require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

  $usuarioController= new UsuarioController();
  $usuarios = $usuarioController->editarUsuario();

?>

  <main class="container mt-3 mb-3">

    <h1>Editar Usuario</h1>

    <form action="editar.php?id_Usuarios=<?=$usuarios->id_Usuarios?>" method="post" class="row g-3">

        <div class="col-md-12">

            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required value="<?=$usuarios->nome?>">

        </div>

        <div class="col-md-6">

            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required value="<?=$usuarios->email?>">

        </div>

        <div class="col-md-6">

            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
            <p class="text-secondary">Caso queira manter a senha, deixe o campo em branco.</p>

        </div>

        <div class="col-md-8">
        <label for="perfil" class="form-label">Perfil</label>

        <select name="perfil" class="form-select" id="perfil" required>

            <option value="perfil">Selecione o perfil</option>
            <option value="usuario"
           <?=($usuarios->perfil == "usuario")? "selected":""; ?>>Usuários</option>
           <option value="administrador"
           <?=($usuarios->perfil == "administrador")? "selected":""; ?>>Administrador</option>

        </select>

        </div>

        <div class="col-12">

            <button type="submit" class="btn btn-primary">Confirmar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>

        </div>

    </form>
  </main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";