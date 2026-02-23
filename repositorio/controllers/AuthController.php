<?php
require_once("../config/database.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if(password_verify($senha, $user['senha'])){

            $_SESSION['usuario'] = $user;

            if($user['tipo'] == 'admin'){
                header("Location: ../views/admin/dashboard.php");
            } else {
                header("Location: ../views/aluno/dashboard.php");
            }

        } else {
            echo "Senha incorreta!";
        }

    } else {
        echo "Usuário não encontrado!";
    }
}
?>