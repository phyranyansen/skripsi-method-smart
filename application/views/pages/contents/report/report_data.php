
<style type="text/css">
    .table {
        width: 100%;
        border-spacing: 0;
        /* border-collapse: collapse; */
        border-color: #000;
        margin-left: auto;
        margin-right: auto;
        white-space: nowrap;
        /* padding-right: 5%; */

    }

    .table tr:first-child th,
    .table tr:first-child td {
        border-top: 1px solid #000;
        /* border-bottom: none; */


    }

    .table tr th:first-child,
    .table tr td:first-child {
        border-left: 1px solid #000;
    }

    .table tr th,
    .table tr td {
        border-right: 1px solid #000;
        border-bottom: 1px solid #000;
        padding: 4px;
        vertical-align: top;
        width: 1px;
        font-size: small;
        white-space: nowrap;


    }

    .watermark{
    color:grey;
    /* background-color:rgba(255, 0, 0, 0.5); */
    height:50px;
    width:250px;
    display:flex;
    align-items:center;
    justify-content:center;
    position:fixed;
    bottom:5px;
    right:5px;
    }
</style>

<div class="col-xl-auto">
    <!-- <center> -->
    <div id="printableArea">
        <table style="border: none; text-align:center; font-family: Arial, Helvetica, sans-serif;">
            <tr>
                <td>
                <div class="watermark">
                Report From KNN-Method Site
                </div>
                </td>
            </tr>
            <tr></tr>
        </table>
   
        <center>
            <table align="center" style="border: none; text-align:center; font-family: Arial, Helvetica, sans-serif;" class="center">
                <tr>
                    <td style="font-size: 20px; font-weight: bold;">
                    LAPORAN DATA UJI
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 16px; font-weight: bold;">
                    <?php if($this->session->userdata('data_uji') == 'semua'){ echo "( DATAT TESTING & TRAINING )";}
                    else{ echo "( DATA ".strtoupper($this->session->userdata('data_uji'))." )"; }; ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 14px; font-weight: 600;">
                     IMPLEMENTASI ALGORITMA K-NEAREST NEIGHBOR
                    </td>
                </tr>
                <tr>
            </tr>
            </table>
        </center>
        <table border="1" id="data-table" class="table table-bordered" style="margin-top: 1%;">
            <thead style="background-color: whitesmoke; position: relative;">
                <tr>
                <th>No.</th>
                <th>NPM</th>
                <th>IPK</th>
                <th>Status Bekerja</th>
                <th>Cuti Semester</th>
                <th>Jumlah MK Mengulang</th>
                <th>Jumlah Organisasi</th>
                <th>Keterangan Lulus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $cek= 1;
                if($data_uji!=null)
                {
                foreach ($data_uji as $row) { 
                    ?>
                   <?php if($row['ket_lulus']==null)
                    {
                        if($no==1)
                        {
                            echo "<tr style='background-color:coral'><td colspan='8'>Data Testing</td></tr>";
                        }
                        ?>
                       
                        <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['NPM'] ?></td>
                        <td><?= $row['IPK'] ?></td>
                        <td><?= $row['status_bekerja'] ?></td>
                        <td><?= $row['cuti_semester'] ?></td>
                        <td><?= $row['jumlah_mk_diulang'] ?></td>
                        <td><?= $row['jumlah_organisasi'] ?></td>
                        <td><?= $row['ket_lulus'] ?></td>
                      </tr>
                  <?php  
                      }else{
                        if($cek==1)
                        {
                            echo "<tr style='background-color:cadetblue'><td colspan='8'>Data Training</td></tr>";
                        }
                        ?>
                        <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['NPM'] ?></td>
                        <td><?= $row['IPK'] ?></td>
                        <td><?= $row['status_bekerja'] ?></td>
                        <td><?= $row['cuti_semester'] ?></td>
                        <td><?= $row['jumlah_mk_diulang'] ?></td>
                        <td><?= $row['jumlah_organisasi'] ?></td>
                        <td><?= $row['ket_lulus'] ?></td>
                      </tr>
                     <?php $cek++; } ?>
                <?php   } }else{
                    echo "<tr style='text-align:center; color:red'><td colspan='7'>Data Tidak Ditemukan!</td></tr>";
                } ?>                
                
            </tbody>
        </table>
        
    </div>
</div>