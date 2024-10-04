<?php include "cabecalho.php"; ?>

<?php
    if(isset ($_POST["nome"])
    && isset($_POST["valor"])
    && isset($_POST["codigodebarras"])
    && isset($_POST["datavalidade"]))
    {
         if(empty($_POST["nome"])){
            echo "<br><div class = 'alert alert-danger'>
            Campo nome não pode estar em branco</div>";
        }
        else if(empty($_POST["valor"])){
            echo "<br><div class = 'alert alert-danger'>
            Campo valor não pode estar em branco</div>";
        }        
        else if(empty($_POST["codigodebarras"])){
            echo "<br><div class = 'alert alert-danger'>
            Campo codigo de barras não pode estar em branco</div>";
        }
        else if(empty($_POST["datavalidade"])){
            echo "<br><div class = 'alert alert-danger'>
            Campo data de validade não pode estar em branco</div>";
        }else{
            include "conexao.php";

            $nome = $_POST["nome"];
            $valor = str_replace(",", ".", $_POST )$_POST["valor"];
            $codigobarras = $_POST["codigobarras"];

            $query = "INSERT INTO produtos (DESCRIÇÃO, VALOR, CODIGO_BARRAS, ATIVO) 
            value ('$nome', $valor, '$codigobarras', 1)";

            $resultado = $conexao->query($query);
            if($resultado){
                echo "<div class='alert alert-success'>
                Salvo no banco com sucesso
                </div>";
            }

            //Executa a lógica do programa
            //Salvar no banco
            echo "<h1> Salvo no banco de dados com sucesso </h1>";
        }
    }
?>


<form action="novo_produto.php" method="post">
<label>nome</label>
<input type="text" name="nome"/>
<br>
<label>Valor</label>
<input type="number" name="valor"/>
<br>
<label>Código de barras</label>
<input type="text" name="codigodebarras"/>
<br>
<label>Data de validade</label>
<input type="date" name="datavalidade"/>
<br>
<button type="submit" class="btn btn-success">
    Enviar dados</button>
</form>

<?php include "rodape.php"; ?>