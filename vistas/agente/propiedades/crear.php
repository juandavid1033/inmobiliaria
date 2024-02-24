<?php
require_once("../../../conexion/conexion.php");
$db = new Database();
$conectar = $db->conectar();
session_start();

$consulta_tipos_propiedad = $conectar->prepare("SELECT id_tipo_propiedad, nombre_tipo FROM tipo_propiedad");
$consulta_tipos_propiedad->execute();
$tipos_propiedad = $consulta_tipos_propiedad->fetchAll(PDO::FETCH_ASSOC);

$consulta_estados_propiedad = $conectar->prepare("SELECT id_estado_propiedad, nombre_estado_propiedad FROM estado_propiedad");
$consulta_estados_propiedad->execute();
$estados_propiedad = $consulta_estados_propiedad->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>INMOBILIARIA IBAGUE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="../../../img/favicon.png" rel="icon">
    <link href="../../../img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="../../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="../../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="../../../css/style.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="index.html">Agencia<span class="color-b">Inmobiliaria</span></a>
            <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">crear</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">volver</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="propiedad.php">Propiedades</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="margin-top: 200px;">

        <div class="container mt-5">
            <h2>Formulario de Propiedad</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tipo_propiedad">Tipo de propiedad:</label>
                    <select class="form-control" id="tipo_propiedad" name="tipo_propiedad">
                        <?php foreach ($tipos_propiedad as $tipo_propiedad) : ?>
                            <option value="<?php echo $tipo_propiedad['id_tipo_propiedad']; ?>">
                                <?php echo $tipo_propiedad['nombre_tipo']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="text" class="form-control" id="precio" name="precio" required>
                </div>
                <div class="form-group">
                    <label for="estado_propiedad">Estado de propiedad:</label>
                    <select class="form-control" id="estado_propiedad" name="estado_propiedad">
                        <?php foreach ($estados_propiedad as $estado_propiedad) : ?>
                            <option value="<?php echo $estado_propiedad['id_estado_propiedad']; ?>">
                                <?php echo $estado_propiedad['nombre_estado_propiedad']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="imagenes">Imágenes:</label>
                    <input type="file" class="form-control-file" id="imagenes" name="imagenes[]" multiple required>
                </div>
                <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
            </form>
        </div>


        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["registrar"])) {
        // Recuperar los datos del formulario
        $tipo_propiedad = $_POST["tipo_propiedad"];
        $direccion = $_POST["direccion"];
        $precio = $_POST["precio"];
        $estado_propiedad = $_POST["estado_propiedad"];
        $descripcion = $_POST["descripcion"]; // Nuevo campo de descripción
        $imagenes = $_FILES["imagenes"];

        // Verificar si la propiedad ya existe
        $consulta_propiedad_existente = $conectar->prepare("SELECT id_propiedad FROM propiedad WHERE direccion = ?");
        $consulta_propiedad_existente->execute([$direccion]);
        $propiedad_existente = $consulta_propiedad_existente->fetch(PDO::FETCH_ASSOC);

        if ($propiedad_existente) {
            echo "<div class='container mt-3'><div class='alert alert-danger' role='alert'>Error: La propiedad ya existe.</div></div>";
        } else {
            // Insertar datos en la tabla propiedad
            $insertar_propiedad = $conectar->prepare("INSERT INTO propiedad (id_tipo_propiedad, direccion, precio, descripcion, id_estado_propiedad) VALUES (?, ?, ?, ?, ?)");
            $insertar_propiedad->execute([$tipo_propiedad, $direccion, $precio, $descripcion, $estado_propiedad]);

            // Obtener el ID de la propiedad insertada
            $id_propiedad = $conectar->lastInsertId();

            // Insertar nombres de imágenes en la tabla imagenes
            foreach ($imagenes["name"] as $key => $nombre) {
                $nombre_imagen = $nombre;
                $ruta_imagen = "carpeta_imagenes/" . $nombre_imagen; // Ruta donde se guardará la imagen

                // Mover la imagen al directorio deseado
                move_uploaded_file($imagenes["tmp_name"][$key], $ruta_imagen);

                // Insertar el nombre de la imagen en la tabla imagenes con el ID de la propiedad
                $insertar_imagen = $conectar->prepare("INSERT INTO imagenes (id_propiedad, imagenes) VALUES (?, ?)");
                $insertar_imagen->execute([$id_propiedad, $nombre_imagen]);
            }

            echo "<div class='container mt-3'><div class='alert alert-success' role='alert'>Propiedad agregada correctamente.</div></div>";
        }
    }

        ?>


    </div>
    <!--/ footer Star /-->
    <section class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">AgenciaInmoniliaria</h3>
                        </div>
                        <div class="w-body-a">
                            <p class="w-text-a color-text-a">
                                Somos una inmobiliaria dedicada a brindar soluciones integrales en bienes raíces, ofreciendo servicios de compra, venta y alquiler de propiedades residenciales y comerciales. Nuestro compromiso es encontrar la opción perfecta que satisfaga las necesidades y expectativas de nuestros clientes.
                            </p>
                        </div>
                        <div class="w-footer-a">
                            <ul class="list-unstyled">
                                <li class="color-a">
                                    <span class="color-text-a">Phone .</span> contact@example.com
                                </li>
                                <li class="color-a">
                                    <span class="color-text-a">Email .</span> +54 356 945234
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">Compañia</h3>
                        </div>
                        <div class="w-body-a">
                            <div class="w-body-a">
                                <ul class="list-unstyled">
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Site Map</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Legal</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Agent Admin</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Careers</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Affiliate</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">Sitios internacionales</h3>
                        </div>
                        <div class="w-body-a">
                            <ul class="list-unstyled">
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Venezuela</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">China</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Hong Kong</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Argentina</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Singapore</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Philippines</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="nav-footer">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">inicio</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">propiedades</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="socials-a">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">EstateAgency</span> All Rights Reserved.
                        </p>
                    </div>
                    <div class="credits">
                        <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">About</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Property</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Blog</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright
                        <span class="color-a">EstateAgency</span> All Rights Reserved.
                    </p>
                </div>
                <div class="credits">
                    <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!--/ Footer End /-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/scrollreveal/scrollreveal.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>

</body>

</html>