<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtProducto"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtCantidad"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtTotal"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $producto = $_POST["txtProducto"];
    $descripcion = $_POST["txtDescripcion"];
    $cantidad = $_POST["txtCantidad"];
    $precio = $_POST["txtPrecio"];
    $total = $_POST["txtTotal"];
     
    $sentencia = $bd->prepare("INSERT INTO venta( producto,descripcion,cantidad,precio,total) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$producto,$descripcion,$cantidad,$precio,$total]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>