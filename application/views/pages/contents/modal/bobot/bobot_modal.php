  <!-- Modal Tambah -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ganti-bobot">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Bobot Form</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                   </div>
                              <form class="" action="javascript:void(0);" id="edit-bobot">
                                 <div class="modal-body">
                                      <div class="form-group">
                                              <label>Value</label>
                                              <select class="select2 form-control mb-3 custom-select" name="id_kriteria" style="width: 100%; height:36px; background-color:lightsalmon" id="kriteria">
                                                  <option value="0">Pilih</option>
                                                  <?php foreach($bobot as $row){ ?>
                                                    <option value="<?= $row['Id_Kriteria']; ?>"><?= $row['Nama_Kriteria']; ?></option>
                                                    <?php } ?>
                                              
                                            </select>
                                      </div>
                                      <div class="form-group">
                                              <label>Value</label>
                                                <div>
                                                  <input type="number" name="bobot" class="form-control" required placeholder="0.00" id="value"/>
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