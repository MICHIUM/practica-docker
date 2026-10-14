<?php
$host = 'db-examen';
$usuario = 'root';
$password = 'secret';
$base_datos = 'productos_db';

$conexion = new mysqli($host, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $precio = $_POST['precio'] ?? '';

    $sql = "INSERT INTO productos (nombre, categoria, precio) VALUES ('$nombre', '$categoria', '$precio')";

    if ($conexion->query($sql) === TRUE) {
        echo "<h3>¡Producto guardado con éxito en la base de datos!</h3>";
        echo "<br><a href='index.html'>Volver</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
$conexion->close();
?>