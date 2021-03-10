<?php
session_start();
include_once("conexao.php");

$id_cadastro = filter_input(INPUT_POST, 'id_cadastro', FILTER_SANITIZE_NUMBER_INT);
$chave = filter_input(INPUT_POST, 'chave', FILTER_SANITIZE_STRING);
$licenciamento1 = filter_input(INPUT_POST, 'licenciamento1', FILTER_SANITIZE_STRING);
$descricao1 = filter_input(INPUT_POST, 'descricao1', FILTER_SANITIZE_NUMBER_INT);
$licenciamento2 = filter_input(INPUT_POST, 'licenciamento2', FILTER_SANITIZE_STRING);
$decricao2 = filter_input(INPUT_POST, 'decricao2', FILTER_SANITIZE_NUMBER_INT);
$licenciamento3 = filter_input(INPUT_POST, 'licenciamento3', FILTER_SANITIZE_STRING);
$decricao3 = filter_input(INPUT_POST, 'decricao3', FILTER_SANITIZE_NUMBER_INT);
$licenciamento4 = filter_input(INPUT_POST, 'licenciamento4', FILTER_SANITIZE_STRING);
$decricao4 = filter_input(INPUT_POST, 'decricao4', FILTER_SANITIZE_NUMBER_INT);
$licenciamento5 = filter_input(INPUT_POST, 'licenciamento5', FILTER_SANITIZE_STRING);
$decricao5 = filter_input(INPUT_POST, 'decricao5', FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "UPDATE cadastros SET chave='$chave', licenciamento1='$licenciamento1', descricao1='$descricao1', 
 licenciamento2='$licenciamento2', decricao2='$decricao2', licenciamento3='$licenciamento3', decricao3='$decricao3',
 licenciamento4='$licenciamento4', decricao4='$decricao4', licenciamento5='$licenciamento5', decricao5='$decricao5' WHERE id_cadastro='$id_cadastro'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

if(mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: consulta.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: edit.php?id_cadastro=$id_cadastro");
}