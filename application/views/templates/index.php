<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>SMART-System - {title}</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <base href="<?= base_url(); ?>">
        <link rel="shortcut icon" href="assets/admin/vertical/assets/favicon/favicon.ico">
         <!-- Sweet Alert -->
         <link href="assets/admin/vertical/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
        <!-- DataTables -->
        <link href="assets/admin/vertical/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/admin/vertical/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->

        <!-- X-editable css -->
        <link type="assets/admin/vertical/assets/text/css" href="plugins/x-editable/css/bootstrap-editable.css" rel="stylesheet">

         <!-- Dropzone css -->
         <link href="assets/admin/vertical/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
         <link href="assets/admin/vertical/assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">
         
         <!-- admin css -->
        <link href="assets/admin/vertical/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://fontawesome.com/search/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link href="assets/admin/vertical/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/admin/vertical/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/admin/vertical/assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!-- <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> SMART</a> -->
                        <a href="index.html" class="logo"><img src="assets/admin/vertical/assets/favicon/favicon.ico" height="24" alt="logo"> Smart</a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="<?= base_url('dashboard'); ?>" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard
                                         <!-- <span class="badge badge-pill badge-primary float-right">7</span> -->
                                    </span>
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table"></i> <span> Data Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="advanced-rating.html">Data Kriteria</a></li>
                                    <li><a href="advanced-alertify.html">Data Bobot</a></li>
                                    <li><a href="<?= base_url('data-pariwisata'); ?>">Data Pariwisata</a></li>
                                </ul>
                            </li>
                            
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-server-security"></i> <span> Security Setings </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('daftar-barang'); ?>">Data User</a></li>
                                    <li><a href="advanced-rating.html">Group User</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="<?= base_url('smart-method'); ?>" class="waves-effect"><i class="mdi mdi-chart-bar"></i><span> Smart Method </span></a>
                            </li>
                            <li class="menu-title">Report</li>

                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-outline"></i><span> Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="form-elements.html">Laporan Penjualan</a></li>
                                    <li><a href="form-validation.html">Laporan</a></li>
                                    <li><a href="form-advanced.html">Form Advanced</a></li>
                                    <li><a href="form-editors.html">Form Editors</a></li>
                                    <li><a href="form-uploads.html">Form File Upload</a></li>
                                    <li><a href="form-mask.html">Form Mask</a></li>
                                    <li><a href="form-summernote.html">Summernote</a></li>
                                    <li><a href="form-xeditable.html">Form Xeditable</a></li>
                                </ul>
                            </li>
                          

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <i class="ti-bell noti-icon"></i>
                                        <span class="badge badge-success noti-icon-badge">23</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5><span class="badge badge-danger float-right">87</span>Notification</h5>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                                            <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-martini"></i></div>
                                            <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                        </a>

                                        <!-- All-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            View All
                                        </a>

                                    </div>
                                </li>

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="<?= base_url().'/assets/admin/vertical/assets/'?>images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Welcome</h5>
                                        </div>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My Wallet</a>
                                        <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left waves-light waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>
                                <li class="hide-phone app-search">
                                    <form role="search" class="">
                                        <input type="text" placeholder="Search..." class="form-control">
                                        <a href=""><i class="fa fa-search"></i></a>
                                    </form>
                                </li>
                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">
                           
                            <div class="row">
                                    <div class="col-sm-12" style="margin-bottom:10px;">
                                        <div class="page-title-box">
                                            <div class="btn-group float-right">
                                                <ol class="breadcrumb hide-phone p-0 m-0">
                                                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                                    <li class="breadcrumb-item active">{}</li>
                                                </ol>
                                            </div>
                                     
                                            
                                        </div>
                                    </div>
                                </div>
                               
                                <!-- end page title end breadcrumb -->
                                {page}
                                
                            </div><!-- container -->
                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    <small>
                        <span style="float:left">© <?= date('Y') ?> phyranyansen</span>
                        <span style="float:right">Version 1.0.</span>

                    </small>
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/admin/vertical/assets/js/jquery.min.js"></script>
        <script src="assets/admin/vertical/assets/js/popper.min.js"></script>
        <script src="assets/admin/vertical/assets/js/bootstrap.min.js"></script>
        <script src="assets/admin/vertical/assets/js/modernizr.min.js"></script>
        <script src="assets/admin/vertical/assets/js/detect.js"></script>
        <script src="assets/admin/vertical/assets/js/fastclick.js"></script>
        <script src="assets/admin/vertical/assets/js/jquery.slimscroll.js"></script>
        <script src="assets/admin/vertical/assets/js/jquery.blockUI.js"></script>
        <script src="assets/admin/vertical/assets/js/waves.js"></script>
        <script src="assets/admin/vertical/assets/js/jquery.nicescroll.js"></script>
        <script src="assets/admin/vertical/assets/js/jquery.scrollTo.min.js"></script>

         <!-- Required datatable js -->
         <script src="assets/admin/vertical/assets/plugins/datatables/jquery.dataTables.min.js"></script>
         <script src="assets/admin/vertical/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="assets/admin/vertical/assets/plugins/datatables/dataTables.buttons.min.js"></script>
         <script src="assets/admin/vertical/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
         <script src="assets/admin/vertical/assets/plugins/datatables/jszip.min.js"></script>
         <script src="assets/admin/vertical/assets/plugins/datatables/pdfmake.min.js"></script>
         <script src="assets/admin/vertical/assets/plugins/datatables/vfs_fonts.js"></script>
         <script src="assets/admin/vertical/assets/plugins/datatables/buttons.html5.min.js"></script>
         <script src="assets/admin/vertical/assets/plugins/datatables/buttons.print.min.js"></script>
         <script src="assets/admin/vertical/assets/plugins/datatables/buttons.colVis.min.js"></script>
         <!-- Responsive examples -->
         <script src="assets/admin/vertical/assets/plugins/datatables/dataTables.responsive.min.js"></script>
         <script src="assets/admin/vertical/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
 
         <!-- Datatable init js -->
         <script src="assets/admin/vertical/assets/pages/datatables.init.js"></script>

        <script src="assets/admin/vertical/assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
        <script src="assets/admin/vertical/assets/plugins/tiny-editable/numeric-input-example.js"></script>
        <script src="assets/admin/vertical/assets/plugins/tabledit/jquery.tabledit.js"></script>        
        
        <!-- XEditable Plugin -->
        <script src="assets/admin/vertical/assets/plugins/moment/moment.js"></script>
        <script type="text/javascript" src="assets/admin/vertical/assets/plugins/x-editable/js/bootstrap-editable.min.js"></script>
        <script type="text/javascript" src="assets/admin/vertical/assets/pages/xeditable.js"></script>

         <!-- Sweet-Alert  -->
         <script src="assets/admin/vertical/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
         <script src="assets/admin/vertical/assets/pages/sweet-alert.init.js"></script> 

               <!-- Parsley js -->
        <script type="text/javascript" src="assets/admin/vertical/assets/plugins/parsleyjs/parsley.min.js"></script>

         <!-- Dropzone js -->
         <script src="assets/admin/vertical/assets/plugins/dropzone/dist/dropzone.js"></script>
         <script src="assets/admin/vertical/assets/plugins/dropify/js/dropify.min.js"></script>

         <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });


            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
        <!-- App js -->
        <script src="assets/admin/vertical/assets/js/app.js"></script>
        <script type="text/javascript">
        {content}

            $('#my-table').Tabledit({
                  columns: {
                    identifier: [0, 'id', 'kode_barang', 'nama_barang', 'harga', 'stock', 'kategori', 'tanggal'],                    
                    editable: [[1, 'col1'], [2, 'col1'], [3, 'col1'],  [4, 'col1'],  [5, 'col1'],  [6, 'col1']],
                    
                  }
                });

            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
            </script>
    </body>
</html>