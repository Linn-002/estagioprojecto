<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Painel Administrativo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">DEFEL MASCAVO</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book"></i><span>Gestão do Conteúdo</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="#" class="active">
              <i class="bi bi-circle"></i><span>Visualizar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Adicionar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Editar</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-collection"></i><span>Gestão de Áreas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Adicionar</span>
            </a>
          </li>
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Editar</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Relatórios</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Emitir Relatório</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Perfil</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contacto</span>
        </a>
      </li><!-- End Contact Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Gestao de conteudo</h1>
      <nav class="layout">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
          <li class="breadcrumb-item ">Dashboard</li>
          <li class="breadcrumb-item">Gestao de Conteudo</li>
          <li class="breadcrumb-item active">Visualizar</li>
        </ol>
        <div class="search-bar">
          <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" id="searchBar" placeholder="Search" title="Enter search keyword">
            <button type="submit" class="botao" title="Search"><i class="bi bi-search"></i></button>
          </form>
        </div><!-- End Search Bar -->
      </nav>
    </div><!-- End Page Title -->

    <section class="section ">
      <div class="row layout">
        <!-- Card with header and footer -->
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Card with header and footer</h5>
              <b>Resumo:</b> Ut in ea error laudantium quas omnis officia. Sit sed praesentium voluptas. Corrupti
              inventore consequatur
              nisi necessitatibus modi consequuntur soluta id. Enim autem est esse natus assumenda. Non sunt dignissimos
              officiis expedita. Consequatur sint repellendus voluptas.
              Quidem sit est nulla ullam. Suscipit debitis ullam iusto dolorem animi dolorem numquam. Enim fuga ipsum
              dolor nulla quia ut.
              Rerum dolor voluptatem et deleniti libero totam numquam nobis distinctio. Sit sint aut. Consequatur rerum
              in.
            </div>
            <div class="card-footer">
              Footer
            </div>
          </div>
        </div>
        <!-- End Card with header and footer -->
        <!-- Card with header and footer -->
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Card with header and footer</h5>
              <b>Resumo:</b> Ut in ea error laudantium quas omnis officia. Sit sed praesentium voluptas. Corrupti
              inventore consequatur
              nisi necessitatibus modi consequuntur soluta id. Enim autem est esse natus assumenda. Non sunt dignissimos
              officiis expedita. Consequatur sint repellendus voluptas.
              Quidem sit est nulla ullam. Suscipit debitis ullam iusto dolorem animi dolorem numquam. Enim fuga ipsum
              dolor nulla quia ut.
              Rerum dolor voluptatem et deleniti libero totam numquam nobis distinctio. Sit sint aut. Consequatur rerum
              in.
            </div>
            <div class="card-footer">
              Footer
            </div>
          </div>
        </div>
        <!-- End Card with header and footer -->
        <!-- Card with header and footer -->
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Card with header and footer</h5>
              <b>Resumo:</b> Ut in ea error laudantium quas omnis officia. Sit sed praesentium voluptas. Corrupti
              inventore consequatur
              nisi necessitatibus modi consequuntur soluta id. Enim autem est esse natus assumenda. Non sunt dignissimos
              officiis expedita. Consequatur sint repellendus voluptas.
              Quidem sit est nulla ullam. Suscipit debitis ullam iusto dolorem animi dolorem numquam. Enim fuga ipsum
              dolor nulla quia ut.
              Rerum dolor voluptatem et deleniti libero totam numquam nobis distinctio. Sit sint aut. Consequatur rerum
              in.
            </div>
            <div class="card-footer">
              Footer
            </div>
          </div>
        </div>
        <!-- End Card with header and footer -->
        <!-- Card with header and footer -->
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Card with header and footer</h5>
              <b>Resumo:</b> Ut in ea error laudantium quas omnis officia. Sit sed praesentium voluptas. Corrupti
              inventore consequatur
              nisi necessitatibus modi consequuntur soluta id. Enim autem est esse natus assumenda. Non sunt dignissimos
              officiis expedita. Consequatur sint repellendus voluptas.
              Quidem sit est nulla ullam. Suscipit debitis ullam iusto dolorem animi dolorem numquam. Enim fuga ipsum
              dolor nulla quia ut.
              Rerum dolor voluptatem et deleniti libero totam numquam nobis distinctio. Sit sint aut. Consequatur rerum
              in.
            </div>
            <div class="card-footer">
              Footer
            </div>
          </div>
        </div>
        <!-- End Card with header and footer -->

      </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>