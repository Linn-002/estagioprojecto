<?php
require_once("../../config/database.php");

// Verifica se o usuário é admin
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

// Pegar ID do conteúdo
if (!isset($_GET['id'])) {
    header("Location: conteudo.php");
    exit();
}

$id = intval($_GET['id']);

// Buscar dados atuais do conteúdo
$res = $conn->query("SELECT * FROM conteudos WHERE id = $id");
if ($res->num_rows == 0) {
    echo "Conteúdo não encontrado!";
    exit();
}
$conteudo = $res->fetch_assoc();

// Atualizar conteúdo
if (isset($_POST['salvar'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $descricao = $_POST['descricao'];
    $area_id = $_POST['area_id'];

    // Verifica se enviou novo arquivo
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['name'] != '') {
        // Remove o arquivo antigo
        $arquivoAntigo = "../../uploads/" . $conteudo['arquivo'];
        if (file_exists($arquivoAntigo)) {
            unlink($arquivoAntigo);
        }

        $arquivo = $_FILES['arquivo']['name'];
        move_uploaded_file($_FILES['arquivo']['tmp_name'], "../../uploads/" . $arquivo);
    } else {
        $arquivo = $conteudo['arquivo']; // mantém o antigo
    }

    $conn->query("UPDATE conteudos SET 
                    titulo='$titulo', 
                    autor='$autor', 
                    descricao='$descricao', 
                    area_id=$area_id, 
                    arquivo='$arquivo'
                 WHERE id=$id");

    header("Location: editar_conteudo.php");
    exit();
}

// Buscar todas as áreas
$areas = $conn->query("SELECT * FROM areas");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Painel Administrativo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">

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
                        <a href="conteudo.php">
                            <i class="bi bi-circle"></i><span>Visualizar</span>
                        </a>
                    </li>
                    <li>
                        <a href="adicionarConteudo.php">
                            <i class="bi bi-circle"></i><span>Adicionar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="active">
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

        <section class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">

                    <div class="mb-3">
                        <a href="visualizar_conteudos.php" class="btn btn-link text-decoration-none p-0 text-secondary">
                            <i class="bi bi-arrow-left"></i> Voltar para a lista
                        </a>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-dark py-3">
                            <h2 class="h5 mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Conteúdo</h2>
                        </div>

                        <div class="card-body p-4">
                            <form method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Título:</label>
                                    <input type="text" name="titulo"
                                        value="<?php echo htmlspecialchars($conteudo['titulo']); ?>"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Autor:</label>
                                    <input type="text" name="autor"
                                        value="<?php echo htmlspecialchars($conteudo['autor']); ?>"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Descrição:</label>
                                    <textarea name="descricao" class="form-control" rows="4"><?php echo htmlspecialchars($conteudo['descricao']); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Área:</label>
                                    <select name="area_id" class="form-select" required>
                                        <?php
                                        // Resetando o ponteiro do loop de áreas caso necessário
                                        $areas->data_seek(0);
                                        while ($a = $areas->fetch_assoc()):
                                        ?>
                                            <option value="<?php echo $a['id']; ?>" <?php if ($a['id'] == $conteudo['area_id']) echo "selected"; ?>>
                                                <?php echo htmlspecialchars($a['nome']); ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <hr class="my-4">

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Arquivo (PDF):</label>

                                    <div class="alert alert-info d-flex align-items-center mb-3" role="alert">
                                        <i class="bi bi-file-earmark-check fs-4 me-2"></i>
                                        <div>
                                            <small class="d-block text-muted">Arquivo atual:</small>
                                            <strong><?php echo htmlspecialchars($conteudo['arquivo']); ?></strong>
                                        </div>
                                    </div>

                                    <label class="form-label small text-muted">Substituir arquivo (deixe em branco para manter o atual):</label>
                                    <input type="file" name="arquivo" class="form-control" accept=".pdf">
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" name="salvar" class="btn btn-warning btn-lg fw-bold">
                                        <i class="bi bi-check-circle me-1"></i> Salvar Alterações
                                    </button>
                                    <a href="conteudo.php" class="btn btn-light">Cancelar</a>
                                </div>

                            </form>
                        </div>
                    </div>
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
    <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../assets/vendor/quill/quill.js"></script>
    <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>

</body>

</html>