<?php include "cabecalho.php"; ?>

<?php
if(isset($_GET["Id"]) && !empty($_GET["Id"]))
{
    include "conexao.php";
    sql = "Select Id, Descricao, Valor, Codigo_Barras from produtos where Id = $_GET[Id]";
    $resultado = $conexao->query($sql);
    if($resultado)
    {
        if(resultado->num_rows > 0){

        
            while($row = $resultado->fetch_assoc());
            {
                $id =$row["Id"];
                $descricao = $row["Descricao"];
                $valor = $row["Valor"];
                $codigo_barras = $row["Codigo_Barras"];
            }
        }
        else
        {

        }
        
    }
    else
    {
        header("location: produtos.php");
    }
}
else
{
    header("location: produtos.php");
}



?>
<form action="editar_produto.php" method="post">
    <input name="id" value="<?php echo $id ?>"/>
    <input name="descricao" value="<?php echo $descricao ?>"/>
    <input name="valor" value="<?php echo $valor ?>"/>
    <input name="codigo_barras" value="<?php echo $codigo_barras ?>"/>
    <button type="submit">
        Salvar alterações
    </button>
    

</form>

<?php include "rodape.php"; ?>