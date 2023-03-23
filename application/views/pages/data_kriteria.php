<div class="row">
        <div class="col-md-12 col-lg-12 ">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                            <h4 class="mt-0 header-title">Data <?= $title; ?> <span class="float-right">
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
                                                    <a href="#" class="dropdown-item" id="delete_all">
                                                        <i class="bi bi-trash mr-2"></i> Hapus Semua
                                                        <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item dropdown-footer"></a>
                                                </div>
                                            </span></h4>
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#alternatif" role="tab">Kriteria</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#konversi" role="tab">Kriteria Detail</a>
                                                    </li>
                                                </ul>
                
                                                <!-- Tab Kriteria -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active p-3" id="alternatif" role="tabpanel">
                                                    <table id="wisata"  class="table table-bordered">
                                                        <thead style="background-color: whitesmoke;">
                                                            <tr>
                                                                <th style="width: 10px;">No.</th>
                                                                <th>Kode Kriteria</th>
                                                                <th>Nama Kriteria</th>
                                                                <th>Atribut</th>
                                                                <th style="text-align: center; width: 10%;"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $no=1; foreach($list as $row) { ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $row['Kode_Kriteria'] ?></td>
                                                                <td><?= $row['Nama_Kriteria'] ?></td>
                                                                <td><?= $row['Atribut'] ?></td>
                                                                <td style="text-align: center; width: 10%;">
                                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="edit-wisata" data-WisataEdit="<?= $row['Id_Kriteria']?>"><i class="fa fa-pencil"></i></a>
                                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="delete-wisata" data-WisataDelete="<?= $row['Id_Kriteria']?>"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                          <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <!-- Tab Nilai -->
                                                    <div class="tab-pane p-3" id="konversi" role="tabpanel">
                                                    <div style="width:100%;height:700px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
                                                        <table id="kriteria"  class="table table-bordered">
                                                            <thead style="background-color: whitesmoke;">
                                                                <tr>
                                                                    <th style="width: 10px;">No.</th>
                                                                    <th>Kode Kriteria</th>
                                                                    <th>Nama Kriteria</th>
                                                                    <th style="width: 120px;">Kualitatif Nilai</th>
                                                                    <th>Kuantitatif Nilai</th>
                                                                    <th>Keterangan</th>
                                                                    <th style="text-align: center; width: 10%;"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $no=1; foreach($kriteria as $row) { ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $row['Kode_Kriteria'] ?></td>
                                                                    <td><?= $row['Nama_Kriteria'] ?></td>
                                                                    <td><?= $row['Nilai_Kualitatif'] ?></td>
                                                                    <td><?= $row['Nilai_Kuantitatif'] ?></td>
                                                                    <td><?= $row['Keterangan'] ?></td>
                                                                    <td style="text-align: center; width: 10%;">
                                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="edit-wisata" data-WisataEdit="<?= $row['Id_Kriteria']?>"><i class="fa fa-pencil"></i></a>
                                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="delete-wisata" data-WisataDelete="<?= $row['Id_Kriteria']?>"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                                </tr>
                                                            <?php } ?>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                    </div>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                                    </div>