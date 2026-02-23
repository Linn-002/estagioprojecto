<?php

$host = "localhost";
$db   = "defeldb";   // ← sua base de dados
$user = "root";
$pass = "";          // se tiver senha, coloque aqui

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

session_start();