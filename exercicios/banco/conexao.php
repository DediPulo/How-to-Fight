<?php
$conn = new mysqli("localhost", "root", "", "webteste");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}