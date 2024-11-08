<?php include "cabecalho.php"; ?>

<?php

if( isset($_POST['id']) && !empty($_POST['id'])&&
    isset($_POST['descricao']) && !empty($_POST['descricao'])&&
    isset($_POST['valor']) && !empty($_POST['valor'])&&
    isset($_POST['codigo_barras']) && !empty($_POST['codigo_barras'])
)
    {
        include "conexao.php";
        $sql = "UPDATE PRODUTOS SET Descricao = '$_POST[descricao]',
                                    Valor = '$_POST[valor]',
                                    Codigo_Barras = '$_POST[codigo_barras]',
                                    Categoria_ID = $_POST[categoria_id]
                WHERE Id = $_POST[id]";
                
        $resultado = $conexao->query($sql);
        if($resultado)
        {

        }
        else
        {

        }
    }



if(isset($_GET["Id"]) && !empty($_GET["Id"]))
{
    include "conexao.php";
    $sql = "Select Id, Descricao, Valor, Codigo_Barras, Categoria_ID from produtos where Id = $_GET[Id]";
    $resultado = $conexao->query($sql);
    if($resultado)
    {
        if($resultado->num_rows > 0){

        
            while($row = $resultado->fetch_assoc())
            {
                $id = $row["Id"];
                $descricao = $row["Descricao"];
                $valor = $row["Valor"];
                $codigo_barras = $row["Codigo_Barras"];
                $categoria_id = $row["Categoria_ID"];
            }
        }
        else
        {
            header("location: produtos.php?erro=Nenhum registro encontrado");
        }
        
    }
    else
    {
        header("location: produtos.php?erro=Erro do if do resultado");
    }
}
else
{
    header("location: produtos.php?erro=Nenhum id informado");
}



?>
<form action="editar_produto.php?Id=<?php echo $id; ?>" method="post">
    <input name="id" value="<?php echo $id ?>"/>
    <input name="descricao" value="<?php echo $descricao ?>"/>
    <input name="valor" value="<?php echo $valor ?>"/>
    <input name="codigo_barras" value="<?php echo $codigo_barras ?>"/>

    <select name="categoria_id">
        <?php
            $sql_categorias = "Select Id, Nome from Categorias";
            $resultado_categorias = $conexao->query($sql_categorias);
            if ($resultado_categorias->num_rows > 0) {
                while($row = $resultado_categorias->fetch_assoc()) 
                {
                    if($categoria_id == $row[Id])
                    {
                        echo "<option selected value='$row[Id]'> $row[Nome] </option>";
                    }else{
                    echo "<option value='$row[Id]'> $row[Nome] </option>";
                    }
                }
            }else{
                echo "<option value='0'> Não tem categoria cadastrada";
            }
        ?>

        <option value="2">Valor 2</option>
        <option value="3">Valor 3</option>
    </select>
    <br>
    <button type="submit">
        Salvar alterações
    </button>
</form>

<?php include "rodape.php"; ?>