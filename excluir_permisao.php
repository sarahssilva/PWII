<?php
    include 'conexao.php';

    if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
        $id = $_GET['id'];

        $sql = "DELETE FROM permissoes WHERE id = $id";

        $conexao->query($sql);
        $conexao->close();
    }

    header('Location: permissoes.php');
?>