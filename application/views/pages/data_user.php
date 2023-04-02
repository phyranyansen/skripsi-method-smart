                       
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

                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#pariwisata-tambah">
                                            <i class="bi bi-plus-circle mr-2"></i> Tambah Data
                                            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item dropdown-footer"></a>
                                    </div>
                                </span></h4>
                                            <div style="width:100%;height:500px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
                                            <table id="wisata"  class="table table-bordered">
                                                <thead style="background-color: whitesmoke;">
                                                <tr>
                                                    <th style="width: 10px;">No.</th>
                                                    <th>Username</th>
                                                    <th>Status</th>
                                                    <th>Aktivasi</th>
                                                    <th style="text-align: center; width: 10%;"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $no=1; foreach($list as $row) {
                                                      if($row['Status']==1)
                                                      {
                                                        $status = 'Administrator';
                                                      }else{
                                                        $status = 'User Public';
                                                      }

                                                      if($row['Activated']==1)
                                                      {
                                                        $activation = '<span class="text-success">Aktif</span>';
                                                      }else{
                                                        $activation = '<span class="text-warning">Tidak Aktif</span>';
                                                      }
                                                    ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['Username'] ?></td>
                                                    <td><?= $status ?></td>
                                                    <td><?= $activation ?></td>
                                                    <th style="text-align: center; width: 10%;">
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#user-edit" id="edit-user" data-UserEdit="<?= $row['Id_Login']?>"><i class="fa fa-pencil"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="delete-user" data-UserDelete="<?= $row['Id_Login']?>"><i class="fa fa-trash"></i></a>
                                                    </th>
                                                </tr>
                                               <?php } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->