<?php
session_start();
require "conexao.php";

if (isset($_POST['create_usuario'])){
  $email = mysqli_real_escape_string($conexaoBD,trim($_POST['email_usuario']));
  $cpf = mysqli_real_escape_string($conexaoBD,trim($_POST['cpf_usuario']));
  $telefone = mysqli_real_escape_string($conexaoBD,trim($_POST['telefone_usuario']));
  $nome = mysqli_real_escape_string($conexaoBD,trim($_POST['nome_usuario']));
  $nascimento = mysqli_real_escape_string($conexaoBD,trim($_POST['data_usuario']));

  $sql = "INSERT INTO usuario(email_usuario,cpf_usuario,telefone_usuario,nome_usuario,nascimento_usuario) VALUES ('$email','$cpf','$telefone','$nome','$nascimento')";
  
  mysqli_query($conexaoBD,$sql);
  
   
  if (mysqli_affected_rows($conexaoBD) > 0) {
    $_SESSION['mensagem'] = 'usuario criado com sucesso';
    header('Location:index.php');
    exit;
  }else{
    $_SESSION['mensagem'] = 'não foi possivel criar usuario';
    header('Location:index.php');
    exit;
  }
}

if (isset($_POST['update_usuario'])){
  $usuario_id = mysqli_real_escape_string($conexaoBD,$_POST['usuario_id']);
  $email = mysqli_real_escape_string($conexaoBD,trim($_POST['email_usuario']));
  $cpf = mysqli_real_escape_string($conexaoBD,trim($_POST['cpf_usuario']));
  $telefone = mysqli_real_escape_string($conexaoBD,trim($_POST['telefone_usuario']));
  $nome = mysqli_real_escape_string($conexaoBD,trim($_POST['nome_usuario']));
  $nascimento = mysqli_real_escape_string($conexaoBD,trim($_POST['data_usuario']));

  $sql = "INSERT INTO usuario(email_usuario,cpf_usuario,telefone_usuario,nome_usuario,nascimento_usuario) VALUES ('$email','$cpf','$telefone','$nome','$nascimento')";
  
  mysqli_query($conexaoBD,$sql);
  
   
  if (mysqli_affected_rows($conexaoBD) > 0) {
    $_SESSION['mensagem'] = 'usuario criado com sucesso';
    header('Location:index.php');
    exit;
  }else{
    $_SESSION['mensagem'] = 'não foi possivel criar usuario';
    header('Location:index.php');
    exit;
  }
}

if (isset($_POST['delete_usuario'])) {
  $usuario_id = mysqli_real_escape_string($conexaoBD,$_POST['delete_usuario']);
   
  $sql = "DELETE FROM usuario WHERE id '$usuario_id'";
  mysqli_query($conexaoBD,$sql);

  if(mysqli_affected_rows($conexaoBD) > 0){
    $_SESSION['message'] = 'usuario deletado com sucesso';
    header('Location:index.php');
  }else{
    $_SESSION['message'] = 'usuario não foi deletado';
    header('Location:index.php');
  }

}
?>