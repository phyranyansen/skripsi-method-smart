                       
                       <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Daftar <?= $title; ?></h4>
                                            <p class="text-muted m-b-30 font-14">
                                              Report List
                                            </p>
                                            <table id="wisata"  class="table table-bordered">
                                                <thead style="background-color: whitesmoke;">
                                                <tr>
                                                    <th style="width: 10px;">No.</th>
                                                    <th>Kode Report</th>
                                                    <th>Nama Report</th>
                                                    <th>Keterangan</th>
                                                    <th style="text-align: center; width: 10%;">Show</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $no=1; foreach($list as $row) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['Kode_Report'] ?></td>
                                                    <td><?= $row['Nama_Report'] ?></td>
                                                    <td><?= $row['Keterangan'] ?></td>
                                                    <th style="text-align: center; width: 10%;">
                                                        <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#<?=$row['Kode_Report'] ?>"><i class="fa fa-print"></i></a>
                                                    </th>
                                                </tr>
                                               <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->