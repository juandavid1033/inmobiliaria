<?php
require_once("../../../conexion/conexion.php");
$db = new Database();
$conectar = $db->conectar();
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["actualizar"])) {
    // Verificar si se recibió el ID de la propiedad
    if (isset($_POST["id_propiedad"])) {
        $id_propiedad = $_POST["id_propiedad"];

        // Recuperar los datos del formulario
        $tipo_propiedad = $_POST["tipo_propiedad"];
        $direccion = $_POST["direccion"];
        $precio = $_POST["precio"];
        $descripcion = $_POST["descripcion"];
        $id_estado_propiedad = $_POST["id_estado_propiedad"];

        // Realizar la actualización en la base de datos
        $actualizar_propiedad = $conectar->prepare("UPDATE propiedad SET 
            id_tipo_propiedad = ?,
            direccion = ?,
            precio = ?,
            descripcion = ?,
            id_estado_propiedad = ?
            WHERE id_propiedad = ?");

        $actualizar_propiedad->execute([$tipo_propiedad, $direccion, $precio, $descripcion, $id_estado_propiedad, $id_propiedad]);

        // Redirigir a una página de éxito o a la página de propiedades
        header("Location: ../index.php"); // Cambia "propiedades.php" a la página donde se muestran las propiedades
        exit();
    }
} else {
    // Si no es una solicitud POST válida o no se incluyó el botón de actualizar, redirigir a la página principal o de propiedades
    header("Location: propiedades.php"); // Cambia "propiedades.php" a la página donde se muestran las propiedades
    exit();
}
?>
