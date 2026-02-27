<?php 

session_start();
require_once '../config/database.php';
header('Content-Type: application/json');
// $where = $status ? "WHERE c.status = '$status'" : "";
$sql = "SELECT c.id_chamado, usuarios.nome as nome_usuario, a.nome as nome_ambiente,b.nome, c.prioridade,t.nome as nome_tecnico, c.status from chamados c
 inner join usuarios on id_solicitante = usuarios.id_usuario 
 join ambientes a on c.id_ambiente = a.id_ambiente
 JOIN blocos b ON a.id_bloco = b.id_bloco
 LEFT JOIN usuarios t ON c.id_tecnico = t.id_usuario
    
";

$res = $conn->query($sql);
$dados = $res->fetch_all(MYSQLI_ASSOC);



echo json_encode($dados);