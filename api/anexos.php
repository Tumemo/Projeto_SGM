<?php

session_start();
require_once '../config/database.php';
header('Content-Type: application/json');

$sql = "select caminho_arquivo, tipo_anexo from chamados_anexos;";

$res = $conn->query($sql);
$dados = $res->fetch_all(MYSQLI_ASSOC);



echo json_encode($dados);