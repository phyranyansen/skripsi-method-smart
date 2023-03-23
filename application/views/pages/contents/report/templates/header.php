<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= base_url(); ?>">
    <link rel="shortcut icon" href="assets/admin/vertical/assets/favicon/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
      <!-- Sweet Alert -->
     <link href="assets/admin/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
     <link href="https://adminlte.io/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css">

    <link href="assets/admin/vertical/assets/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />
        <link href="assets/admin/vertical/assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
        <link href="assets/admin/vertical/assets/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet" />
        <link href="assets/admin/vertical/assets/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/admin/vertical/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
      <!-- Dropzone css -->
      <link href="assets/admin/vertical/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
      <link href="assets/admin/vertical/assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">
 
         <!-- admin css -->
      <link href="assets/admin/vertical/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link href="assets/admin/vertical/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

    
    
    <link href="assets/admin/vertical/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- for excel library -->
    <script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>
    <script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script type="text/javascript" src="//unpkg.com/blob.js@1.0.1/Blob.js"></script>
    <script type="text/javascript" src="//unpkg.com/file-saver@1.3.3/FileSaver.js"></script>
    <title>Report-Preview</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light fixed-top">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page">Report Preview</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-print"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href='javascript:void(0);' onclick="generatePDF()"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
            <li><a class="dropdown-item" onclick="doit('xlsx');" style="cursor: pointer;"><i class="fa fa-file-excel-o"></i> Excel</a></li>
            <li><a class="dropdown-item" onclick="printDiv('printableArea')" style="cursor: pointer;"><i class="fa fa-print"></i> Print</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- <li></li> -->
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" aria-current="page" data-toggle="modal" data-target="#<?= $kode; ?>">Refresh <i class="fa fa-refresh"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>
<br>
<br>