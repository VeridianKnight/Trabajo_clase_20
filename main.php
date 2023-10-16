<?php

///////////////////////////////////////////
// IMPORTACION DE ARCHIVOS PHP RELEVANTES//
//////////////////////////////////////////
include 'conexion.php';
include 'utilidades.php';

////////////////////////////////////////////
// MANEJO DE FUNCIONES QUE UTILIZAN JQUERY//
///////////////////////////////////////////
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["eliminarImpar"]) && $_POST["eliminarImpar"] === 'true') {
        eliminarImpar($conexion);
    } elseif (isset($_POST["nombre"]) && isset($_POST["precio"])) {
        agregarProductos($conexion);
    } elseif (isset($_POST["agregarCien"]) && $_POST["agregarCien"] === 'true'){
        agregarCien($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----------------------->
    <!-- IMPORTACION DE CSS-->
    <!----------------------->
    <link rel="stylesheet" href="style.css">
    <title>Api Curso PHP Clase 20</title>
</head>
<body>

    <!----------------------------------------------->
    <!-- FORMULARIO PARA AGRAGAR UN NUEVO PRODUCTO -->
    <!----------------------------------------------->
    <form id="agregar-form" action="main.php" method="post">
        <label for="input-nombre" id="label-nombre">Nombre del Producto:</label>
        <input type="text" name="nombre" id="input-nombre" required>
        <label for="input-precio" id="label-precio">Precio del producto:</label>
        <input type="text" name="precio" id="input-precio">
        <input type="submit" value="Agregar Producto" id="btn-enviar-formulario">
    </form>

    <!--------------------------------------------------->
    <!-- FORMULARIO PARA ELIMIAR ELEMENTOS DE ID IMPAR -->
    <!--------------------------------------------------->
    <form id="eliminar-form" action="main.php" method="post">
        <button type="button" id="btn-eliminar-impar" name="eliminarImpar">Eliminar impares</button>
    </form>

    <!-------------------------------------------->
    <!-- FORMULARIO PARA AGREGAR CIEN ELEMENTOS -->
    <!-------------------------------------------->
    <form id="agregar-cien-form" action="main.php" method="post">
        <button type="button" id="btn-agregar-cien" name="agregarCien">aregar Cien</button>
    </form>

    <!------------------------------------------------------------------->
    <!-- ESPACIO DE RESPUESTA DE LOS BOTONES DE ELIMIAR Y AGREGAR CIEN -->
    <!------------------------------------------------------------------->
    <div id="respuesta-btn"></div>

    <!--------------------------------------------------------------->
    <!-- SCRIPT PHP PARA MOSTRAR LOS ELEMENTOS DE LA BASE DE DATOS -->
    <!--------------------------------------------------------------->
    <?php mostrarProductos($conexion); ?>

    <!------------------------------------------------->
    <!-- IMPORTACION DE JQUERY Y ARCHIVO JAVA-SCRIPT -->
    <!------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
</body>
</html>