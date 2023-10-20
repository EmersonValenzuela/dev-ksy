<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
  <title><?= $title ?> | SISTEMA VENTAS KSY</title>
  <!-- Google font-->
  <link href="<?= base_url() ?>css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
  <link href="<?= base_url() ?>css-1?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">


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
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/slick.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/scrollbar.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/animate.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/select2.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/toast/jquery.toast.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/datatables.css">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/bootstrap.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
  <link id="color" rel="stylesheet" href="<?= base_url() ?>assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsive.css">

  <?php
  for ($i = 0; $i < count($links); $i++) {
    echo $links[$i];
  }
  ?>

</head>