<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webteste";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}
echo "Conectado com sucesso<br>";

// Tabela Rankings
$sql = "CREATE TABLE IF NOT EXISTS rankings (
    id_ranking INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    ordem INT NOT NULL
)";
$conn->query($sql);

// Script para inserir rankings iniciais
$sql = "INSERT IGNORE INTO rankings (id_ranking, nome) VALUES
        (1, 'Rookie'),
        (2, 'Apprentice'),
        (3, 'Fighter'),
        (4, 'Master')";
$conn->query($sql);

// Tabela Usuários 
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nick VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    id_ranking INT DEFAULT 1,
    FOREIGN KEY (id_ranking) REFERENCES rankings(id_ranking)
)";
$conn->query($sql);

// Tabela Módulos
$sql = "CREATE TABLE IF NOT EXISTS modulos (
    id_modulo INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL
)";
$conn->query($sql);

//insert das tabelas
$sql = "INSERT IGNORE INTO modulos (id_modulo, titulo)
VALUES 
  (1, 'Fundamentos'),
  (2, 'Ofensiva'),
  (3, 'Estratégia');";
  $conn->query($sql);

// Tabela Missões
$sql = "CREATE TABLE IF NOT EXISTS missoes (
    id_missao INT AUTO_INCREMENT PRIMARY KEY,
    id_modulo INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    dificuldade VARCHAR(50),
    FOREIGN KEY (id_modulo) REFERENCES modulos(id_modulo)
)";
$conn->query($sql);

//missões modulo 1
$sql = "INSERT IGNORE INTO missoes (id_missao, id_modulo, titulo, dificuldade) VALUES
  (4, 1, 'duck n launch', 'Fácil'),
  (5, 1, 'armor', 'Médio'),
  (6, 1, 'sidestep n launch', 'Difícil');";
  $conn->query($sql);

//missões modulo 2
  $sql = "INSERT IGNORE INTO missoes (id_missao, id_modulo, titulo, dificuldade) VALUES
  (7, 2, 'testar_Ataques', 'Fácil'),
  (8, 2, 'wr', 'Fácil'),
  (9, 2, 'ws', 'Fácil'),
  (10, 2, 'fc', 'Fácil'),
  (11, 2, 'string1', 'Médio'),
  (12, 2, 'string2', 'Médio'),
  (13, 2, 'grab', 'Fácil'),
  (14, 2, 'escape', 'Difícil'),
  (15, 2, 'combo', 'Difícil'),
  (16, 2, 'Condition', 'Difícil');";
  $conn->query($sql);


// Tabela Progresso
$sql = "CREATE TABLE IF NOT EXISTS progresso (
    id_progresso INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_missao INT NOT NULL,
    data_inicio DATETIME,
    data_fim DATETIME,
    status VARCHAR(50),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_missao) REFERENCES missoes(id_missao)
)";
$conn->query($sql);

//finalização das tabelas
echo "Todas as tabelas foram criadas/verificadas com sucesso!";

?>