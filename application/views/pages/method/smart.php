<div class="row">
        <div class="col-md-12 col-lg-12 ">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                
                                                <h4 class="mt-0 header-title">Method Proccess</h4>
                                                <p class="text-muted m-b-30 font-14">Proses Perhitungan Metode MCDA  <br> Dengan Algoritma <code class="highlighter-rouge"> Simple Multi Attribute Rating Technique (Smart)</code> Untuk Pemilihan Objek Wisata
 Di Kota Batu Malang.</p>
                
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#alternatif" role="tab">Alternatif</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#konversi" role="tab">Konversi Nilai</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#bobot" role="tab">Bobot</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#utility" role="tab">Nilai Utility</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#nilai" role="tab">Nilai Akhir</a>
                                                    </li>
                                                </ul>
                
                                                <!-- Tab Alternatif -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active p-3" id="alternatif" role="tabpanel">
                                                    <div style="width:100%;height:600px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
                                                        <table  class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                               <td colspan="8">Data Objek Pariwisata</td> 
                                                            </tr>
                                                            <tr style="background-color: whitesmoke;">
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
                                                            <tbody>
                                                              <?php
                                                              if(!empty($alternatif)){
                                                              $no=1; foreach($alternatif as $row){ ?>
                                                                <tr>
                                                                <td><?= $no++; ?>.</td>
                                                                <td><?= $row['Kode_Pariwisata'] ?></td>
                                                                <td><?= $row['Nama_Pariwisata'] ?></td>
                                                                <td><?= $row['Jarak'] ?> Km</td>
                                                                <td><?= $row['Tiket_Masuk'] ?></td>
                                                                <td><?= $row['Jam_Operasional'] ?></td>
                                                                <td><?= $row['Aksebility'] ?></td>
                                                                <td><?= $row['Fasilitas'] ?></td>
                                                                </tr>
                                                                <?php } }else{ ?>
                                                                 <tr>
                                                                    <td colspan="8" style="text-align: center;">Data Not Available!</td>
                                                                 </tr>
                                                               <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    </div>

                                                    <!-- Tab Konversi -->
                                                    <div class="tab-pane p-3" id="konversi" role="tabpanel">
                                                   <div style="width:100%;height:600px;overflow:scroll;overflow-y:scroll;overflow-x:hidden; background-color: white;">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="8">Penilaian / Rate, Setiap Objek Wisata Berdasarkan Kriteria Yang Telah Ditentukan.</td> 
                                                        </tr>
                                                        <tr style="background-color: whitesmoke;">
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
                                                        <tbody id="data-konversi">
                                                            
                                                        </tbody>
                                                    </table>
                                                   </div>
                                                    </div>
                                                    <div class="tab-pane p-3" id="bobot" role="tabpanel">
                                                        <div style="height: 600px;">
                                                         <span class="float-right">
                                                        <a class="nav-link" data-toggle="dropdown" href="#">
                                                            <i class="bi bi-three-dots-vertical" style="color:grey"></i>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                            <span class="dropdown-item dropdown-header">Menu</span>
                                                            <div class="dropdown-divider"></div>

                                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#ganti-bobot">
                                                                <i class="fa fa-refresh mr-2"></i> Ganti Bobot
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="#" class="dropdown-item dropdown-footer"></a>
                                                        </div>
                                                    </span>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th colspan="7">NILAI BOBOT</th>
                                                        </tr>
                                                        <tr style="background-color: whitesmoke;">
                                                            <th style="width: 10px;">No.</th>
                                                            <th>K1</th>
                                                            <th>K2</th>
                                                            <th>K3</th>
                                                            <th>K4</th>
                                                            <th>K5</th>
                                                            <th>Total</th>
                                                        </tr>
                                                        </thead>
                                                        <?php if(!empty($alternatif)){ ?>
                                                        <tbody id="data-bobot">
                                                            
                                                        </tbody>
                                                        <?php } ?>
                                                    </table>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th colspan="7">NORMALISASI BOBOT</th>
                                                        </tr>
                                                        <tr style="background-color: whitesmoke;">
                                                            <th style="width: 10px;">No.</th>
                                                            <th>K1</th>
                                                            <th>K2</th>
                                                            <th>K3</th>
                                                            <th>K4</th>
                                                            <th>K5</th>
                                                            <th>Total</th>
                                                        </tr>
                                                        </thead>
                                                        <?php if(!empty($alternatif)){ ?>
                                                        <tbody id="bobot-normalisasi">
                                                            
                                                        </tbody>
                                                        <?php } ?>
                                                    </table>
                                                    </div>
                                                    </div>
                                                    <div class="tab-pane p-3" id="utility" role="tabpanel">
                                                    <div style="width:100%;height:600px;overflow:scroll;overflow-y:scroll;overflow-x:hidden; background-color: white;">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td colspan="8">Menghitung Nilai Utility Dengan Mengkonvensikan Nilai masing-masing Dari Kriteria Data Objek Wisata</td>
                                                            </tr>
                                                        <tr  style="background-color: whitesmoke;">
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
                                                    </table>
                                                   </div>
                                                    </div>
                                                    <div class="tab-pane p-3" id="nilai" role="tabpanel">
                                                    <div style="width:100%;height:600px;overflow:scroll;overflow-y:scroll;overflow-x:hidden; background-color: white;">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="5">Hasil dari perhitungan nilai akhir kemudian diurutkan dari nilai yang terbesar hingga yang terkecil, alternatif dengan nilai akhir yang terbesar menunjukan alternatif yang terbaik</td>
                                                        </tr>
                                                        <tr style="background-color: whitesmoke;">
                                                            <th style="width: 10px;">No.</th>
                                                            <th>Kode Alternatif</th>
                                                            <th>Alternatif</th>
                                                            <th>Nilai Akhir</th>
                                                            <th>Rank</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="data-result">

                                                        </tbody>
                                                    </table>
                                                   </div>
                                                    </div>
                                                
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                  