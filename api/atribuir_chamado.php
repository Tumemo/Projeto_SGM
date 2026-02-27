<?php

session_start();
require_once '../config/database.php';
header('Content-Type: application/json');

if(!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'gestor'){
    echo json_encode(["success" => false, "message" => "Acesso Negado"]);
    exit;
}

