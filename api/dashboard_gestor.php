<?php

session_start();
require_once '../config/database.php';
header('Content-Type: application/json');

if(!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'gestor'){
    echo json_encode(["success" => false, "message" => "Acesso negado."]);
    exit;
}

$sql = "select
            sum(case when status = 'aberto' then 1 else 0 end) as abertos,
            sum(case when status = 'em_execucao' then 1 else 0 end) as em_execucao,
            sum(case when prioridade = 'urgente' and status != 'fechado' then 1 else 0 end) as urgentes,
            count(*) as total from chamados";
$res = $conn->query($sql);
$dados = $res->fetch_assoc();

echo json_encode($dados);