<?php
session_start();
require 'conexao.php'
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <?php include('mensagem.php');?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Lista de usuarios
                            <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar usuario</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Nome</th>
                                    <th>nascimento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM usuario';
                                $usuario = mysqli_query($conexaoBD,$sql);
                                if(mysqli_num_rows($usuario) > 0){
                                    foreach($usuario as $usuario){
                                ?>
                                <tr>
                                    <td><?=$usuario['id_usuario']?></td>
                                    <td><?=$usuario['email_usuario']?></td>
                                    <td><?=$usuario['cpf_usuario']?></td>
                                    <td><?=$usuario['telefone_usuario']?></td>
                                    <td><?=$usuario['nome_usuario']?></td>
                                    <td><?=date('d/m/Y',strtotime($usuario['nascimento_usuario']))?></td>
                                    <td>
                                        
                                        <a href="usuario-edit.php?id=<?=$usuario['id_usuario']?>" class="btn btn-success btn-sm">Editar</a>
                                        <form action="acoes.php" method="POST" class="d-inline">
                                        <button type="submit" name="delete_usuario" value="<?=$usuario['id_usuario']?>" class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                }
                                }else{
                                    echo'<h5> Nenhum usuario encontrado </h5>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>