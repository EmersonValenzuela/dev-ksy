<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">

    <link rel="icon" href="<?php echo base_url(FAVICON_PATH); ?>" type="image/png" class="icon">
    <link rel="shortcut icon" href="<?php echo base_url(FAVICON_PATH); ?>" type="image/png" class="icon">
    <title><?= $title ?> | Sistema Ventas KSY</title>
    <!-- Google font-->
    <link href="css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="css-1?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/animate.css">

    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url() ?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsive.css">
    <!-- logo css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style2.css">

</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="<?= base_url() ?>assets/images/login/montana.jpg" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div class="login-main">
                            <div><a class="logo text-start" href="index.html"><img src="<?php echo base_url(LOGO_PATH); ?> "alt="Logo de la empresa" class="login"></a></div>
                            <form class="theme-form" id="frm_login">
                                <p>Por favor utilizar sus credenciales para iniciar sesión.</p>
                                <div class="form-group">
                                    <label class="col-form-label">Usuario</label>
                                    <input class="form-control" type="text" name="user_name" id="user_name" placeholder="Ejem. 'Control'">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Contraseña</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" id="user_password" placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Recordar Credenciales</label>
                                    </div>
                                    <button class="btn btn-primary btn-block w-100" id="btn_send" type="submit">INCIAR SESION</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="<?= base_url() ?>" id="url_base">
        </div>
        <div class="toast-container position-absolute top-0 end-0 p-3 toast-index toast-rtl">
            <div class="toast hide toast fade" id="toast_alert" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex justify-content-between alert-secondary">
                    <div class="toast-body" id="text_alert"></div>
                    <button class="btn-close btn-close-white me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="<?= base_url() ?>assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?= base_url() ?>assets/js/notify/bootstrap-notify.min.js"></script>

    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?= base_url() ?>assets/js/script.js"></script>
    <script src="<?= base_url() ?>modules/pages/login.js"></script>
</body>

</html>