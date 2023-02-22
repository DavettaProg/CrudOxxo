<?php 
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
      
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $producto = $_POST["txtproducto"];
    $descripcion = $_POST["txtdescripcion"];
    $cantidad = $_POST["txtcantidad"];
    $precio = $_POST["txtprecio"];
    $total = $_POST["txttotal"];

    $sentencia = $bd->prepare("UPDATE venta SET producto = ?,descripcion = ?,cantidad = ?,precio = ?, total = ?  where codigo = ?;");
    $resultado = $sentencia->execute([$producto, $descripcion, $cantidad, $precio, $total]);

    if ($resultado == TRUE ) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>