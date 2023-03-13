//GET DATATABLE
$(document).ready(function () {
    $('#wisata').DataTable(
        {
            // "fixedHeader" : true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "excel"]
        }).buttons().container().appendTo('#wisata_wrapper .col-md-6:eq(0) ');
    
 });
