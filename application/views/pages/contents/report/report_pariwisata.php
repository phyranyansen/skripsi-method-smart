
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
    <form class="form">   
        <table style="border: none; text-align:center; font-family: Arial, Helvetica, sans-serif;">
            <tr>
                <td>
                <div class="watermark">
                Report From Smart-Method Site
                </div>
                </td>
            </tr>
            <tr></tr>
        </table>
        <center>
            <table align="center" style="border: none; text-align:center; font-family: Arial, Helvetica, sans-serif;" class="center">
                <tr>
                    <td style="font-size: 20px; font-weight: bold;">
                    LAPORAN 
                    IMPLEMENTASI METODE MCDA <br> DENGAN ALGORITMA SIMPLE MULTI ATTRIBUTE RATING TECHNIQUE (SMART)
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 14px; font-weight: 600;">
                    DATA ALTERNATIF OBJEK WISATA DI KOTA BATU MALANG

                    </td>
                </tr>
                <tr>
            </tr>
            </table>
        </center>
        <table  class="table table-bordered" id="export">
                 <thead>
                   <tr style="background-color: whitesmoke;">
                    <th colspan="8">Data Alternatif</th> 
                   </tr>
                   <tr>
                     <th style="width: 10px;">No.</th>
                     <th>Kode Alternatif</th>
                     <th>Alternatif</th>
                     <th>K1</th>
                     <th>K2</th>
                     <th>K3</th>
                     <th>K4</th>
                     <th>K5</th>
                   </tr>
                     </thead>
                     <tbody id="alternatif">
                        
                    </tbody>
                     <thead>
                        <tr style="background-color: whitesmoke;">
                            <th colspan="8">Konversi Nilai Kriteria Alternatif</th>
                        </tr>
                    <tr>
                        <th style="width: 10px;">No.</th>
                        <th>Kode Alternatif</th>
                        <th>Alternatif</th>
                        <th>K1</th>
                        <th>K2</th>
                        <th>K3</th>
                        <th>K4</th>
                        <th>K5</th>
                    </tr
                     </thead>
                     <tbody id="konversi">
                        
                    </tbody>
                    <thead>
                        <tr style="background-color: whitesmoke;">
                            <th colspan="8">Nilai Bobot Kriteria</th>
                        </tr>
                        <tr>
                        <th colspan="1">K1</th>
                        <th>K2</th>
                        <th>K3</th>
                        <th>K4</th>
                        <th>K5</th>
                        <th>Total</th>
                        </tr>
                     </thead>
                     <tbody id="data-bobot">
                        
                    </tbody>
                    <thead>
                        <tr style="background-color: whitesmoke;">
                            <th colspan="8">Nilai Bobot Normalisasi</th>
                        </tr>
                     </thead>
                     <tbody id="data-normalisasi">
                        
                    </tbody>
                    <thead>
                        <tr style="background-color: whitesmoke;">
                            <th colspan="8">Nilai Utility</th>
                        </tr>
                        <tr>
                        <th style="width: 10px;">No.</th>
                        <th>Kode Alternatif</th>
                        <th>Alternatif</th>
                        <th>K1</th>
                        <th>K2</th>
                        <th>K3</th>
                        <th>K4</th>
                        <th>K5</th>
                        </tr>
                     </thead>
                     <tbody id="data-utility">
                        
                    </tbody>
                    </tbody>
                    <thead>
                        <tr style="background-color: whitesmoke;">
                            <th colspan="8">Nilai Akhir</th>
                        </tr>
                        <tr>
                        <th>No.</th>
                        <th>Kode Alternatif</th>
                        <th>Nama Alternatif</th>
                        <th>Nilai Akhir</th>
                        <th>Rank</th>
                        <tr>
                     </thead>
                     <tbody id="data-result">
                        
                    </tbody>
            </table>
    </form>
    </div>
</div>