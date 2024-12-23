
<?php 
	include 'conexao.php';

	if (isset($_GET['id_usuario'])) {
		$id = $_GET['id_usuario'];
		$sql = mysqli_query($conexaoBD, "SELECT * FROM usuario WHERE id_usuario=$id");

        $count = (is_array($sql)) ? count($sql) :1 ;
		if ($count) {
			$n = mysqli_fetch_array($sql);
			$email = $n['email_usuario'];
			$CPF = $n['cpf_usuario'];
            $telefone = $n['telefone_usuario'];
            $nome = $n['nome_usuario'];
            $nascimento = $n['nascimento_usuario'];
		}
	}


	if(isset($_POST['editar'])){
		$id = $_GET["id_usuario"];
		$email = $_POST["email_usuario"];
		$cpf = $_POST["cpf_usuario"];
        $telefone = $_POST["telefone_usuario"];
        $nome = $_POST["nome_usuario"];
        $nascimento = $_POST["nascimento_usuario"];
		$query = "UPDATE usuario SET email_usuario = '$email', cpf_usuario= '$cpf' telefone_usuario = '$telefone' nome_usuario = '$nome' nascimento_usuario = '$nascimento' WHERE id_usuario = $id ";
	    
	    $consulta = mysqli_query($conexaoBD, $query);

	    header('location: index.php');
	}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>usuario-editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar usuario
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form  action="acoes.php"method="POST">
                        <input type="hidden" name="usuario_id">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email_usuario" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>CPF</label>
                                <input type="text" name="cpf_usuario"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="text" name="telefone_usuario" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome_usuario" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Data de nascimento</label>
                                <input type="date" name="data_usuario" class="form-control">
                            </div>
                            <div class="mb-3">
                               <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>