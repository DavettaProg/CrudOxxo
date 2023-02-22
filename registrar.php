<?php
   // print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtcodigo"]) || empty($_POST["txtproducto"]) || empty($_POST["txtdescripcion"]) || empty($_POST["txtcantidad"]) || empty($_POST["txtprecio"]) || empty($_POST["txttotal"]) ){
        echo "Faltan datos";
                header('Location: index.php?mensaje=falta');
                exit();
    }    
    
    include_once 'model/conexion.php';
    $codigo = $_POST["txtcodigo"];
    $producto = $_POST["txtproducto"];
    $descripcion = $_POST["txtdescripcion"];
    $cantidad = $_POST["txtcantidad"];
    $precio = $_POST["txtprecio"];
    $total = $_POST["txttotal"];
    
    $sentencia = $bd->prepare("INSERT INTO venta (codigo,producto,descripcion,cantidad,precio,total) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia ->execute([$codigo,$producto,$descripcion,$cantidad,$precio,$total]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>