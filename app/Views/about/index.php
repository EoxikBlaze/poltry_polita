<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us | Kelompok 17 PBL</title>
    <!-- Google Font: Source Sans Pro and Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>adminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- AdminLTE style -->
    <link rel="stylesheet" href="<?= base_url() ?>adminLTE/dist/css/adminlte.min.css">
    <style>
        /* Custom Styles */
        body {
            background-color: #212529;
            color: #f8f9fa;
            font-family: 'Source Sans Pro', sans-serif;
            padding-top: 30px;
            /* Lift the content up */
        }

        .team-card {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            /* Softer, modern shadow */
            margin-bottom: 20px;
            border-radius: 12px;
            background-color: #343a40;
        }

        .team-header {
            background-color: #495057;
            color: #fff;
            padding: 12px;
            font-size: 18px;
            text-align: center;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .team-card-body {
            padding: 20px;
            background-color: #495057;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        .team-image {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            /* Softer shadow for image */
        }

        .team-title {
            font-weight: bold;
            font-size: 1.2rem;
            color: #f8f9fa;
        }

        .team-description {
            font-size: 0.9rem;
            color: #adb5bd;
            text-align: center;
        }

        .team-footer {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            background-color: #343a40;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        .team-footer .btn {
            font-size: 0.9rem;
        }

        .container-fluid {
            margin-top: 20px;
        }

        /* Centering text */
        .center-text {
            text-align: center;
        }

        /* Branding Logo */
        .branding-logo {
            display: block;
            margin: 20px auto;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #343a40;
            /* Same color as card */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            /* Soft shadow */
        }

        .branding-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            font-weight: bold;
            /* Menambahkan font bold */
            text-transform: uppercase;
            /* Menambahkan caps lock */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.25);
            /* Subtle shadow for logo text */
            color: #f8f9fa;
            margin-bottom: 10px;
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .team-card-body {
                text-align: center;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="center-text">Tentang Kami - Kelompok 17 PBL</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">About Us</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Branding Logo -->
            <section class="content">
                <div class="container-fluid">
                    <div class="text-center">
                        <div class="branding-title">Politry Polita</div> <!-- Title above the logo -->
                        <img src="<?= base_url() ?>/adminLTE/dist/img/logopoltrypolita.png" alt="Politry Polita Logo" class="branding-logo">
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Member 1 -->
                        <div class="col-md-3">
                            <div class="card team-card">
                                <div class="team-header">Ketua Kelompok</div>
                                <div class="card-body team-card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url() ?>/adminLTE/dist/img/rizki.png" alt="User Avatar" class="team-image">
                                        <h5 class="team-title">Muhammad Rizki Maulana</h5>
                                        <p class="team-description">Webdesinger / TRKJ / 2301402021 / Coffe Berenteng</p>
                                    </div>
                                </div>
                                <div class="team-footer">
                                    <a href="#" class="btn btn-sm bg-teal"><i class="fas fa-comments"></i> Chat</a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-user"></i> Profile</a>
                                </div>
                            </div>
                        </div>

                        <!-- Member 2 -->
                        <div class="col-md-3">
                            <div class="card team-card">
                                <div class="team-header">Manajer Project Telor</div>
                                <div class="card-body team-card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url() ?>/adminLTE/dist/img/haqi.png" alt="User Avatar" class="team-image">
                                        <h5 class="team-title">Muhammad Zainal Haqi</h5>
                                        <p class="team-description">Web Designer / TRKJ / 2301402039 / </p>
                                    </div>
                                </div>
                                <div class="team-footer">
                                    <a href="#" class="btn btn-sm bg-teal"><i class="fas fa-comments"></i> Chat</a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-user"></i> Profile</a>
                                </div>
                            </div>
                        </div>

                        <!-- Member 3 -->
                        <div class="col-md-3">
                            <div class="card team-card">
                                <div class="team-header">Sekretaris & Bendahara</div>
                                <div class="card-body team-card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url() ?>/adminLTE/dist/img/azizah.png" alt="User Avatar" class="team-image">
                                        <h5 class="team-title">Siti Azizahtusholihah</h5>
                                        <p class="team-description">Pengelola Keuangan / TRKJ / 2301402037 / Reading</p>
                                    </div>
                                </div>
                                <div class="team-footer">
                                    <a href="#" class="btn btn-sm bg-teal"><i class="fas fa-comments"></i> Chat</a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-user"></i> Profile</a>
                                </div>
                            </div>
                        </div>

                        <!-- Member 4 -->
                        <div class="col-md-3">
                            <div class="card team-card">
                                <div class="team-header">Backend</div>
                                <div class="card-body team-card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url() ?>/adminLTE/dist/img/bana.png" alt="User Avatar" class="team-image">
                                        <h5 class="team-title">Bana Sugandi</h5>
                                        <p class="team-description">Web Designer / UX / Graphic Artist / Coffee Lover</p>
                                    </div>
                                </div>
                                <div class="team-footer">
                                    <a href="#" class="btn btn-sm bg-teal"><i class="fas fa-comments"></i> Chat</a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-user"></i> Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>adminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>adminLTE/dist/js/adminlte.min.js"></script>
</body>

</html>