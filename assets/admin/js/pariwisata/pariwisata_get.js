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
            scrollY:        "500px",
            scrollX:        true,
            scrollCollapse: true,
            fixedHeader:    {
                header: true,
                footer: false
            }
        });
    
 });
