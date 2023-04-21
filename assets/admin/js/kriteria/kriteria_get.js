//GET
$(document).ready(function () {
    $('#kriteria').DataTable( {
            // "fixedHeader" : true,
            paging: false,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: false,
            autoWidth: false,
            responsive: true,
            scrollY: "500px",
            scrollX:        true,
            scrollCollapse: true,
            fixedHeader:    {
                header: true,
                footer: false
            }
        });
    
 });
 