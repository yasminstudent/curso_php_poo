<?php
    require 'connection.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $id = filter_input(INPUT_GET, "id");
    $usuario = false;

    if($id){
        $usuario = $usuarioDao->findById($id);
    }
    
    if($usuario === false){
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>CRUD</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h3 class="mt-4 mb-4">Editar usuário</h3>
            <form style="width: 500px" action="editar_action.php" method="POST">
                <input type="hidden" name="id" value="<?=$usuario->getId()?>">
                
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control form-control-sm" id="name" name="name" value="<?=$usuario->getNome()?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?=$usuario->getEmail()?>">
                </div>
                <input class="btn btn-primary" type="submit" value="Salvar" name="editar">
            </form>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>
</html>