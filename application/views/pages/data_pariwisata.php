                       
                       <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Daftar <?= $title; ?> 
                                    <?php if($access['CreateStatus']==1){ ?>
                                    <span class="float-right">
                                        <a class="nav-link" data-toggle="dropdown" href="#">
                                            <i class="bi bi-three-dots-vertical" style="color:grey"></i>
                                        </a>

                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                        <span class="dropdown-item dropdown-header">Menu</span>
                                        <div class="dropdown-divider"></div>

                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#pariwisata-tambah">
                                            <i class="bi bi-plus-circle mr-2"></i> Tambah Data
                                            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item" data-toggle="modal" data-target="#pariwisata-upload">
                                            <i class="bi bi-upload mr-2"></i> Upload Data
                                            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                                        </a>
                                        <?php if($access['DeleteStatus']==1){ ?>
                                        <a href="javascript:void(0);" class="dropdown-item" id="delete-all">
                                            <i class="bi bi-trash mr-2"></i> Hapus Semua
                                            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                                        </a>
                                        <?php } ?>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item dropdown-footer"></a>
                                    </div>
                                    </span>
                                    <?php } ?>
                                </h4>
                                            <!-- <div style="width:100%;height:500px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;"> -->
                                            <table id="wisata"  class="table table-bordered">
                                                <thead style="background-color: whitesmoke;">
                                                <tr>
                                                    <th style="width: 10px;">No.</th>
                                                    <th>Kode Pariwisata</th>
                                                    <th>Nama Pariwisata</th>
                                                    <th>Jarak</th>
                                                    <th>Tiket Masuk</th>
                                                    <th>Jam Operasional</th>
                                                    <th>Aksebility</th>
                                                    <th>Fasilitas</th>
                                                    <?php if($access['UpdateStatus']==1 || $access['DeleteStatus']==1){ ?>
                                                    <th style="text-align: center; width: 10%;">Action</th>
                                                    <?php } ?>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $no=1; foreach($list as $row) {
                                                    $explode_harga = explode('- ', $row['Tiket_Masuk']);
                                                    ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['Kode_Pariwisata'] ?></td>
                                                    <td><?= $row['Nama_Pariwisata'] ?></td>
                                                    <td><?= $row['Jarak'] ?> Km</td>
                                                    <td style="width: 200px;"><?php if(!empty($explode_harga[0])){ echo 'Rp '.number_format($explode_harga[0], 0); } if(!empty($explode_harga[1])){ echo ' - '.number_format($explode_harga[1], 0);} ?></td>
                                                    <td>Jam <?= $row['Jam_Operasional'] ?></td>
                                                    <td><?= $row['Aksebility'] ?></td>
                                                    <td><?= $row['Fasilitas'] ?></td>
                                                    <?php if($access['UpdateStatus']==1 || $access['DeleteStatus']==1){ ?>
                                                    <td style="text-align: center; width: 10%;">
                                                     <?php if($access['UpdateStatus']==1){ ?>
                                                        <a href="javascript :void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pariwisata-edit" id="edit-wisata" data-WisataEdit="<?= $row['Id_Pariwisata']?>"><i class="fa fa-pencil"></i></a>
                                                     <?php } if($access['DeleteStatus']==1){ ?>
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="delete-wisata" data-WisataDelete="<?= $row['Kode_Pariwisata']?>"><i class="fa fa-trash"></i></a>
                                                    <?php }  ?>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                               <?php } ?>
                                                </tbody>
                                            </table>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->