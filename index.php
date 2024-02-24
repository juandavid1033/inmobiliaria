<?php

require_once("conexion/conexion.php");
$db = new Database();
$conectar = $db->conectar();
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
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Type</label>
              <select class="form-control form-control-lg form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
                <option>Open House</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">City</label>
              <select class="form-control form-control-lg form-control-a" id="city">
                <option>All City</option>
                <option>Alabama</option>
                <option>Arizona</option>
                <option>California</option>
                <option>Colorado</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bedrooms">Bedrooms</label>
              <select class="form-control form-control-lg form-control-a" id="bedrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="garages">Garages</label>
              <select class="form-control form-control-lg form-control-a" id="garages">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bathrooms">Bathrooms</label>
              <select class="form-control form-control-lg form-control-a" id="bathrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Min Price</label>
              <select class="form-control form-control-lg form-control-a" id="price">
                <option>Unlimite</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--/ Form Search End /-->

  <!--/ Nav Star /-->
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
            <a class="nav-link active" href="index.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro.php">Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Carousel Star /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/slide-1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">IBAGUE, TOLIMA
                      <br> 78345
                    </p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">BIENVENIDOS </span>
                      <br> Agencia inmobiliaria
                    </h1>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Services Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Servicios</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-gamepad"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Lifestyle</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Sientete libre con nuestros servicios, observa, lee y siente paz con estas magnificas propiedades
              </p>
            </div>
            <div class="card-footer-c">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-usd"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Loans</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Acomodate con nosotros como nosotros hacemos con nuestros precios hacia ti
              </p>
            </div>
            <div class="card-footer-c">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Sell</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Las mejores propiedades de la zona, con grandes caracteristicas y las mejores que se adaptan a tus necesidades y gustos
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!--/ Services End /-->



  <section class="property-grid grid">
    <div class="container" style="margin-top: 50px;">
      <h2 class="title-a">Propiedades</h2>
      <div class="row">
        <?php
        $consulta_propiedades = $conectar->query("SELECT * FROM  imagenes,propiedad, tipo_propiedad, estado_propiedad WHERE imagenes.id_propiedad=propiedad.id_propiedad AND propiedad.id_tipo_propiedad = tipo_propiedad.id_tipo_propiedad AND propiedad.id_estado_propiedad = estado_propiedad.id_estado_propiedad");
        // Suponiendo que $registros es el resultado de tu consulta PHP
        while ($registro = $consulta_propiedades->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <!-- Aquí puedes usar el campo correspondiente del registro para la URL de la imagen -->
                <img src="vistas/agente/propiedades/carpeta_imagenes/<?php echo $registro['imagenes']; ?>" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <!-- Aquí puedes usar el campo correspondiente del registro para el título -->
                      <a href="#"><?php echo $registro['nombre_tipo']; ?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <!-- Aquí puedes usar el campo correspondiente del registro para el precio -->
                      <span class="price-a"><?php echo $registro['precio']; ?>$</span>
                    </div>
                    <a href="propiedad_emergente.php?id_imagenes=<?php echo $registro['id_imagenes']; ?>" class="link-a">
                      Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>

                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Direccion</h4>
                        <!-- Aquí puedes usar el campo correspondiente del registro para el área -->
                        <span><?php echo $registro['direccion']; ?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Estado</h4>
                        <!-- Aquí puedes usar el campo correspondiente del registro para el área -->
                        <span><?php echo $registro['nombre_estado_propiedad']; ?></span>
                      </li>
                      <!-- Puedes continuar agregando más detalles del registro aquí -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } // Fin del bucle 
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
      <!--/ Footer End /-->

      <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
      <div id="preloader"></div>

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