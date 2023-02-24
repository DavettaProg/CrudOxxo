<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $producto = $_POST["txtProducto"];
    $descripcion = $_POST["txtDescripcion"];
    $cantidad = $_POST["txtCantidad"];
    $precio = $_POST["txtPrecio"];
    $total = $_POST["txtTotal"];

    $sentencia = $bd->prepare("UPDATE venta SET producto = ?,descripcion = ?,cantidad = ?,precio = ?, total = ?  where codigo = ?;");
    $resultado = $sentencia->execute([$producto, $descripcion, $cantidad, $precio, $total,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>