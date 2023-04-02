                       
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

                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="mdi mdi-refresh mr-2"></i> Reset
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
                                                    <th rowspan="2">No.</th>
                                                    <th rowspan="2">Username</th>
                                                    <th colspan="3"  style="text-align: center;">Menu</th>
                                                </tr>
                                                <tr>
                                                    <th>Data Pariwisata</th>
                                                    <th>Data Kriteria</th>
                                                    <th>Data Bobot</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $no=1; foreach($list as $row) { 
                                                    //Pariwisata Menu
                                                    if($row['pariwisata']==1)
                                                    {
                                                        $pariwisata = '<input type="checkbox" checked id="pariwisata" dataId="'.$row['Id_Login'].'">';
                                                    }else{
                                                        $pariwisata = '<input type="checkbox" unchecked id="pariwisata" dataId="'.$row['Id_Login'].'">';
                                                    }

                                                    //Kriteria Menu
                                                    if($row['kriteria']==1)
                                                    {
                                                        $kriteria = '<input type="checkbox" checked id="kriteria" dataId="'.$row['Id_Login'].'">';
                                                    }else{
                                                        $kriteria = '<input type="checkbox" unchecked id="kriteria" dataId="'.$row['Id_Login'].'">';
                                                    }

                                                    //Bobot Menu
                                                    if($row['bobot']==1)
                                                    {
                                                        $bobot = '<input type="checkbox" checked id="bobot" dataId="'.$row['Id_Login'].'">';
                                                    }else{
                                                        $bobot = '<input type="checkbox" unchecked id="bobot" dataId="'.$row['Id_Login'].'">';
                                                    }
                                                    ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['Username'] ?></td>
                                                    <td><?= $pariwisata ?></td>
                                                    <td><?= $kriteria ?></td>
                                                    <td><?= $bobot ?></td>
                                                </tr>
                                               <?php } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->