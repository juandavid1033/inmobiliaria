<?php
// Verificar si se recibió el ID de la propiedad a eliminar
if (isset($_GET['id'])) {
    require_once("../../../conexion/conexion.php");
    $db = new Database();
    $conectar = $db->conectar(); // Reemplaza "conexion.php" con el nombre de tu archivo de conexión
    // Obtener el ID de la propiedad desde la URL
    $id_propiedad = $_GET['id'];

    try {
        // Obtener las imágenes asociadas a la propiedad
        $consulta_imagenes = $conectar->prepare("SELECT * FROM imagenes WHERE id_propiedad = ?");
        $consulta_imagenes->execute([$id_propiedad]);
        $imagenes = $consulta_imagenes->fetchAll(PDO::FETCH_ASSOC);

        // Eliminar las imágenes asociadas a la propiedad
        $eliminar_imagenes = $conectar->prepare("DELETE FROM imagenes WHERE id_propiedad = ?");
        $eliminar_imagenes->execute([$id_propiedad]);

        // Eliminar la propiedad
        $eliminar_propiedad = $conectar->prepare("DELETE FROM propiedad WHERE id_propiedad = ?");
        $eliminar_propiedad->execute([$id_propiedad]);

        // Redireccionar a una página de éxito o a la página de propiedades
        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        // Manejar el error si ocurre
        echo "Error al eliminar la propiedad: " . $e->getMessage();
    }
} else {
    // Si no se recibió el ID de la propiedad, redireccionar a la página de propiedades
    header("Location:../index.php");
    exit();
}
