<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<!-- dataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/rowreorder/1.3.1/js/dataTables.rowReorder.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script> -->
<!-- dataTable -->
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
                    <!-- Plugins Init js -->
        <script src="assets/admin/vertical/assets/pages/form-advanced.js"></script>
        <script src="assets/admin/sweetalert2/sweetalert2.min.js"></script>
        <script src="assets/admin/vertical/assets/js/app.js"></script>
        
        <!-- Dropzone js -->
         <script src="assets/admin/vertical/assets/plugins/dropzone/dist/dropzone.js"></script>
         <script src="assets/admin/vertical/assets/plugins/dropify/js/dropify.min.js"></script>
        <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
        
        <!-- report -->
        <script type="text/javascript" src="assets/admin/js/report/pariwisata.js"></script>
        <script type="text/javascript" src="assets/admin/js/report/get_report.js"></script>
        <!-- <script type="text/javascript" src="assets/admin/js/report/view_report.js"></script> -->
</body>

</html>



<script>
$('.select2').select2()
//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})


//print
function printDiv(divName) {

    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();

    document.body.innerHTML = originalContents;


}
</script>


<script type="text/javascript">
function doit(type, fn, dl) {
    var elt = document.getElementById('printableArea');
    var wb = XLSX.utils.table_to_book(elt, {
        sheet: "Sheet JS"
    });
    var table =
        "<html><head><style> table, td {border:2px solid black} table {border-collapse:collapse}</style></head><body><table><tr>";
    return dl ?
        XLSX.write(wb, {
            bookType: type,
            bookSST: true,
            type: 'base64'
        }) :
        XLSX.writeFile(wb, fn || ('SMART-Report.' + (type || 'xlsx')));

}
</script>