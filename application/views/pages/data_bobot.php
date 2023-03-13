                       
                       <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Daftar <?= $title; ?> <span class="float-right">
                                    <a class="nav-link" data-toggle="dropdown" href="#">
                                        <i class="bi bi-three-dots-vertical" style="color:grey"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                        <span class="dropdown-item dropdown-header">Menu</span>
                                        <div class="dropdown-divider"></div>

                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#kriteria-tambah">
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
                                            <p class="text-muted m-b-30 font-14">
                                                The Buttons extension for DataTables
                                                provides a common set of options, API methods and styling to display
                                                buttons on a page that will interact with a DataTable. The core library
                                                provides the based framework upon which plug-ins can built.
                                            </p>
                         <!-- <div class="form-group">
                                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name" class="col-md-3 form-control" style="float:right; margin-bottom:2px">
                                            </div> -->
                                            <table id="wisata"  class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th style="width: 10px;">No.</th>
                                                    <th>Kriteria</th>
                                                    <th>Bobot</th>
                                                    <th>Keterangan</th>
                                                    <th>Nilai</th>
                                                    <th style="text-align: center; width: 10%;"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $no=1; foreach($list as $row) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['Bobot'] ?></td>
                                                    <td><?= $row['Keterangan'] ?></td>
                                                    <th style="text-align: center; width: 10%;">
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="edit-wisata" data-WisataEdit="<?= $row['Id_Kriteria']?>"><i class="fa fa-pencil"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="delete-wisata" data-WisataDelete="<?= $row['Id_Kriteria']?>"><i class="fa fa-trash"></i></a>
                                                    </th>
                                                </tr>
                                               <?php } ?>
                                                </tbody>
                                            </table>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->