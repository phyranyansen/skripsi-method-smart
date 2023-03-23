  <!-- Modal Tambah -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="kriteria-tambah">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Data</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                   </div>
                              <form class="" action="javascript:void(0);" id="FormKriteria-add">
                                 <div class="modal-body">
                                      <div class="form-group">
                                              <label>Nama Kriteria</label>
                                              <div>
                                                <input type="text" name="nama_kriteria" class="form-control" required placeholder="Nama"/>
                                                </div>
                                           </div>
                                           <div class="form-group">
                                              <label>Atribut</label>
                                              <select class="select2 form-control mb-3 custom-select" name="atribut" style="width: 100%; height:36px; background-color:lightsalmon" id="atribut">
                                                   <option value="Cost">Cost</option>
                                                    <option value="Benefit">Benefit</option>
                                              
                                            </select>
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
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="kriteria-edit">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Data</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                   </div>
                              <form class="" action="javascript:void(0);d" id="formEdit">
                                 <div class="modal-body">
                                      <div class="form-group">
                                              <label>Nama Kriteria</label>
                                              <div>
                                                <input type="text" name="nama_kriteria" class="form-control" required placeholder="Nama" id="nama_kriteria"/>
                                                <input type="hidden" name="simpan" value="1" id="simpan">
                                                <input type="hidden" name="id_kriteria" id="id_kriteria"> 
                                              </div>
                                           </div>
                                           <div class="form-group">
                                              <label>Atribut</label>
                                              <select class="select2 form-control mb-3 custom-select" name="atribut" style="width: 100%; height:36px; background-color:lightsalmon" id="atribut">
                                                   <option value="Cost">Cost</option>
                                                    <option value="Benefit">Benefit</option>
                                              
                                            </select>
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