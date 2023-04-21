  <!-- Modal Tambah -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="detail-tambah">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Data</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                   </div>
                              <form class="" action="javascript:void(0);" id="FormDetail-add">
                                 <div class="modal-body">
                                     <div class="form-group">
                                        <label>Kriteria</label>
                                        <select class="select2 form-control mb-3 custom-select" name="kriteria" style="width: 100%; height:36px; background-color:lightsalmon" id="atribut">
                                           <?php foreach($list as $row){ ?> 
                                           <option value="<?= $row['Id_Kriteria'] ?>"><?= $row['Nama_Kriteria'] ?></option>
                                           <?php } ?>
                                      </select>
                                </div>
                                      <div class="form-group">
                                              <label>Nilai Kualitatif</label>
                                              <div>
                                                <input type="text" name="kualitatif" class="form-control" required placeholder="Kualitatif"/>
                                                </div>
                                           </div>
                                      <div class="form-group">
                                              <label>Nilai Kuantitatif</label>
                                              <div>
                                                <input type="number" name="kuantitatif" class="form-control" required placeholder="0.00"/>
                                                </div>
                                           </div>
                                      <div class="form-group">
                                              <label>Keterangan</label>
                                              <div>
                                                <input type="text" name="keterangan" class="form-control" required placeholder="Keterangan"/>
                                                </div>
                                           </div>
                                </div>
                                <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                 </div>
                              </form>
                             </div>
                         </div>
                     </div>


  <!-- Modal Edit -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="detail-edit">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Data</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                   </div>
                              <form class="" action="javascript:void(0);" id="FormDetail-edit">
                                 <div class="modal-body">
                                     <div class="form-group">
                                        <label>Kriteria</label>
                                        <select class="select2 form-control mb-3 custom-select" name="kriteria" style="width: 100%; height:36px; background-color:lightsalmon" id="atribut">
                                           <?php foreach($list as $row){ ?> 
                                           <option value="<?= $row['Id_Kriteria'] ?>"><?= $row['Nama_Kriteria'] ?></option>
                                           <?php } ?>
                                      </select>
                                    <input type="hidden" name="simpan" value="1" id="simpan">
                                    <input type="hidden" name="id_detail" id="id_detail"> 
                                </div>
                                      <div class="form-group">
                                              <label>Nilai Kualitatif</label>
                                              <div>
                                                <input type="text" name="kualitatif" class="form-control" id="kualitatif" required placeholder="Kualitatif"/>
                                                </div>
                                           </div>
                                      <div class="form-group">
                                              <label>Nilai Kuantitatif</label>
                                              <div>
                                                <input type="number" name="kuantitatif" class="form-control" id="kuantitatif" required placeholder="0.00"/>
                                                </div>
                                           </div>
                                      <div class="form-group">
                                              <label>Keterangan</label>
                                              <div>
                                                <input type="text" name="keterangan" class="form-control" id="keterangan" required placeholder="Keterangan"/>
                                                </div>
                                           </div>
                                </div>
                                <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                 </div>
                              </form>
                             </div>
                         </div>
                     </div>