<?php 

session_start();
require_once '../config/database.php';
header('Content-Type: application/json');

$sql = "select chamados.id_chamado, usuarios.nome, ambientes.nome, chamados.prioridade, chamados.status from chamados
 inner join usuarios on id_solicitante = usuarios.id_usuario join ambientes on chamados.id_ambiente = ambientes.id_ambiente;";

$res = $conn->query($sql);
$dados = $res->fetch_assoc();



echo json_encode($dados);