</div><!-- container -->
                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer" style="height: fit-content;">
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

         <!-- Sweet-Alert  -->
         <script src="assets/admin/vertical/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
         <script src="assets/admin/vertical/assets/pages/sweet-alert.init.js"></script> 

               <!-- Parsley js -->
        <script type="text/javascript" src="assets/admin/vertical/assets/plugins/parsleyjs/parsley.min.js"></script>
        <script src="assets/admin/vertical/assets/plugins/timepicker/moment.js"></script>
        <script src="assets/admin/vertical/assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        <script src="assets/admin/vertical/assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
        <script src="assets/admin/vertical/assets/plugins/colorpicker/jquery-asColor.js" type="text/javascript"></script>
        <script src="assets/admin/vertical/assets/plugins/colorpicker/jquery-asGradient.js" type="text/javascript"></script>
        <script src="assets/admin/vertical/assets/plugins/colorpicker/jquery-asColorPicker.min.js" type="text/javascript"></script>
        <script src="assets/admin/vertical/assets/plugins/select2/select2.min.js" type="text/javascript"></script>

        <script src="assets/admin/vertical/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/admin/vertical/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/admin/vertical/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="assets/admin/vertical/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
         <!-- Dropzone js -->
         <script src="assets/admin/vertical/assets/plugins/dropzone/dist/dropzone.js"></script>
         <script src="assets/admin/vertical/assets/plugins/dropify/js/dropify.min.js"></script>

         <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        
        
            function timer_reload() {
                    setTimeout(function() {
                        window.location.href =
                            "<?= strtolower($title); ?>";
                    
                    }, 1700);
                }

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
        <!-- Plugins Init js -->
        <script src="assets/admin/vertical/assets/pages/form-advanced.js"></script>
        <script src="assets/admin/sweetalert2/sweetalert2.min.js"></script>
        <script src="assets/admin/vertical/assets/js/app.js"></script>
        <!-- pariwisata -->
        <script type="text/javascript" src="assets/admin/js/pariwisata/pariwisata_get.js"></script>
        <script type="text/javascript" src="assets/admin/js/pariwisata/pariwisata_edit.js"></script>
        <script type="text/javascript" src="assets/admin/js/pariwisata/pariwisata_tambah.js"></script>
        <script type="text/javascript" src="assets/admin/js/pariwisata/pariwisata_hapus.js"></script>
        <script type="text/javascript" src="assets/admin/js/pariwisata/pariwisata_upload.js"></script>
        <!-- kriteria -->
        <script type="text/javascript" src="assets/admin/js/kriteria/kriteria_tambah.js"></script>
        <script type="text/javascript" src="assets/admin/js/kriteria/kriteria_edit.js"></script>
        <script type="text/javascript" src="assets/admin/js/kriteria/kriteria_hapus.js"></script>
        <!-- bobot -->
        <script type="text/javascript" src="assets/admin/js/bobot/bobot_get.js"></script>
        <!-- method -->
        <script type="text/javascript" src="assets/admin/js/method/method_get.js"></script>
        <script type="text/javascript" src="assets/admin/js/method/method_edit.js"></script>

        <!-- report -->
        <script type="text/javascript" src="assets/admin/js/report/view_report.js"></script>
    </body>
</html>