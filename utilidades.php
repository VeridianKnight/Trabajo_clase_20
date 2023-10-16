<?php

///////////////////////////////////////////////////////
// FUNCION PARA AGREGAR PRODUCTOS A LA BASE DE DATOS //
//////////////////////////////////////////////////////
function agregarProductos($conexion) {
    //DECLARACION QUE DETERMINA SI SE ENVIO EL FORMULARIO EH INSERTA UN NUEVO ELEMENTO A LA BASE DE DATOS CON LA INFORMACION DEL FORMULARIO
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["precio"])) {
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $sql = "INSERT INTO productos (nombre, precio) VALUES ('$nombre', '$precio')";//INSERTA PRODUCTOS
        //MANEJOS DE EXITOS Y ERRORES
        if ($conexion->query($sql) === TRUE) {
            header("Location: main.php");//REDIRECCION A MAIN.PHP
            exit();
        } else {
            echo "Error al agregar el producto: " . $conexion->error;
        }
    }
}

/////////////////////////////////////////////////////
// FUNCION PARA MOSTRAR MI BASE DE DATOS EN PANTALLA//
////////////////////////////////////////////////////
function mostrarProductos($conexion){
    $sql="SELECT productos.id, productos.nombre, productos.precio FROM productos";//SELECIONA LO DATOS A MOSTRAR DE LA BASE DE DATOS
    $resultado = $conexion->query($sql);//LLAMA LA REQUEST SQL.
    //MANEJO DE ERRORES Y EXITOS:
    if ($resultado->num_rows > 0){
        echo "<table id='tabla-datos-productos'>";
        echo "<tr><th class='tabla-head' id='id-head'>ID</th>
        <th class='tabla-head' id='nombre-head'>Nombre</th>
        <th class='tabla-head' id='precio-head'>Precio</th></tr>";
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr class='tabla-body'><td id='id-body'>" . $row["id"] . "</td>
            <td id='nombre-body'>" . $row["nombre"] . "</td>
            <td id='precio-body'>" . $row["precio"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Algo salió mal, no se encontraron Productos.";
    }
}

/////////////////////////////////////////////////
// FUNCION PARA ELIMINAR ELEMENTOS DE ID IMPAR //
////////////////////////////////////////////////
function eliminarImpar($conexion) {
    if (isset($_POST['eliminarImpar']) && $_POST['eliminarImpar'] === 'true') {
        $sql = "DELETE FROM productos WHERE id % 2 <> 0";
        if ($conexion->query($sql) === TRUE) {
            echo "Eliminación completada correctamente!";
            echo "<script type='text/javascript'>setTimeout(function() {
                window.location.href = 'main.php';
            }, 2000);</script>"; 
            exit;
        } else {
            echo "Error al eliminar productos: " . $conexion->error;
        }
    }
}

////////////////////////////////////////////////////////////
// FUNCION PARA AGREGAR CIEN PRODUCTOS A LA BASE DE DATOS //
///////////////////////////////////////////////////////////
function agregarCien($conexion){
    //BUCLE FOR PARA CREAR 100 PRODUCTOS :
    for ($i = 1; $i <= 100; $i++) {
        $nombreP = 'Producto N° ' . $i;// DETERMINA EL NOMBRE DE CADA PRODUCTO POR VUELTA DEL BUCLE.
        $precioP = round((rand(10, 10000) + (rand(0, 100) / 100)), 2);//CREA UN PRECIO RANDOM PRO PRODUCTO.
        $sql = "INSERT INTO productos(nombre, precio) VALUES ('$nombreP', $precioP)";//INSERTA EL PRODUCTO A LA TABLA.
        //MANEJO DE EXITOS Y ERRORES.
        if ($conexion->query($sql) === TRUE) {
            echo "<script type='text/javascript'>console.log('Registro insertado correctamente')</script>";
            echo "<script type='text/javascript'>setTimeout(function() {
                window.location.href = 'main.php';
            }, 500);</script>"; 
        } else {
            echo "<script type='text/javascript'>console.log('Error al insertar el registro: ' . $conexion->error . '')</script>";
        }
    }
    
} 
?>
