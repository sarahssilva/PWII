<?php include "cabecalho.php"; ?>

<div id="container-cadastro-usuarios" style='display: flex; justify-content: center;'>
    <div id="login" style="padding: 10px;">
        <h4>Cadastrar usuário</h4>
        <form action="cadastrar_usuario.php" method="post">
            <div style="margin-bottom: 10px;">
                <label for="usuario-login">Login</label><br>
                <input type="text" name="usuario-login" class="form-control" id="usuario-login" required pattern=".*\S.*" title="Este campo não pode conter apenas espaços" maxlength="50">
            </div>
        
            <div style="margin-bottom: 10px;">
                <label for="usuario-senha">Senha</label><br>
                <input type="password" name="usuario-senha" class="form-control" id="usuario-senha" required pattern=".*\S.*" title="Este campo não pode conter apenas espaços" maxlength="80">
            </div>
        
            <div style="margin-bottom: 10px;">
                <label for="usuario-ativo">Ativo</label><br>
                <select class="form-control" id="usuario-ativo" name="usuario-ativo" required>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Salvar" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Ativo</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'conexao.php';

                    $sql = " SELECT id, login, ativo FROM usuarios ORDER BY login; ";

                    $resultado = $conexao->query($sql);

                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>".$row['login']."</td>";
                                echo "<td>".($row['ativo'] == 1 ? 'Sim' : 'Não')."</td>";
                                echo "<td align='right'>";
                                    echo "<a class='btn btn-info' href='editar_usuario.php?id=".$row['id']."'>Editar</a>";
                                    echo "&nbsp;&nbsp;";
                                    echo "<a class='btn btn-danger' onclick='return confirmarExclusao();' href='excluir_usuario.php?id=".$row['id']."'>Excluir</a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmarExclusao() {
        return confirm('Deseja mesmo excluir este usuário?');
    }
</script>

<?php include "rodape.php"; ?>