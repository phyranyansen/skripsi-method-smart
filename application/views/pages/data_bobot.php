                       
                       <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Daftar <?= $title; ?> 
                                            <?php if(empty($bobot) && count($bobot) != count($kriteria)){ ?>
                                   <span class="float-right">
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
                                </span>
                                <?php } ?>
                            </h4>
                                            <p class="text-muted m-b-30 font-14">
                                            <?php if($this->session->userdata('Administrator')){ ?>
                                                <div class="alert alert-danger">
                                                  Bobot Rule : <br> 
                                                  - Dengan mengubah nilai bobot akan mempengaruhi perangkingan setiap nilai alternatif!
                                                  <br>
                                                  - List bobot tidak dapat ditambahkan melebihi data kriteria
                                                  
                                                </div>
                                                            
                                                            <?php } ?>
                                            </p>
                                            <table class="table table-bordered">
                                                        <thead>
                                                        <tr style="background-color: whitesmoke;">
                                                            <th style="width: 10px;">No.</th>
                                                            <th>Kode Kriteria</th>
                                                            <th>Nama Kriteria</th>
                                                            <th>Nilai Bobot</th>
                                                            <th>Keterangan</th>
                                                            <?php if($this->session->userdata('Administrator')){ ?>
                                                            <th>Action</th>
                                                            <?php } ?>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="data-list">
                                                            
                                                        </tbody>
                                                    </table>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->