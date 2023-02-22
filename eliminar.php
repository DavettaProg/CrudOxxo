<?php 
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];

  $sentencia = $bd->prepare("DELETE FROM venta where codigo = ?;");
  $resultado = $sentencia->execute([$codigo]);

  if ($resultado === TRUE) {
    header('Location: index.php?mensaje=eliminado');
   
  } else {
    header('Location: index.php?mensaje=error');
    
  }
  
?>