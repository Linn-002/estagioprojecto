<form method="POST">
    <input type="text" name="nome" placeholder="Nome da Área" required>
    <button type="submit" name="salvar">Salvar</button>
</form>

<?php
require_once("../../config/database.php");

if(isset($_POST['salvar'])){
    $nome = $_POST['nome'];
    $conn->query("INSERT INTO areas (nome) VALUES ('$nome')");
    echo "Área criada!";
}
?>