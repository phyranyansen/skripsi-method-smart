 <!--  Modal Upload -->
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="pariwisata-upload">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title mt-0" id="myLargeModalLabel">Upload Data</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                         </div>
                    <form class="" action="upload-wisata"  enctype="multipart/form-data">
                       <div class="modal-body">
                            <div class="form-group">
                                    <label>Data Pariwisata</label>
                                      <div>
                                           <input type="file" name="excel" id="input-file-now" class="dropify"/>             
                                     </div>
                                 </div>
                             
                      </div>
                      <div class="modal-footer">
                           <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                       </div>
                    </form>
                   </div>
               </div>
           </div>
           
           


           <!-- Modal Tambah -->
           <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="pariwisata-tambah">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Data</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                   </div>
                              <form class="" action="javascript:void(0);" id="add-wisata">
                                 <div class="modal-body">
                                      <div class="form-group">
                                              <label>Nama Pariwisata</label>
                                              <div>
                                                <input type="text" name="nama_pariwisata" class="form-control" required placeholder="Nama"/>
                                                </div>
                                           </div>
                                      <div class="form-group">
                                              <label>Jarak</label>
                                              <div>
                                                <input type="number" name="jarak" class="form-control" required placeholder="25km.."/>
                                                </div>
                                           </div>
                                      <div class="form-group">
                                              <label>Harga Tiket Masuk</label>
                                              <div>
                                                <input type="text" name="tiket_masuk" class="form-control" required placeholder="Rp 0.00"/>
                                                </div>
                                           </div>
                                      <div class="form-group">
                                              <label>Jam Operasional</label>
                                              <div>
                                                <input type="text" name="jam_operasional" class="form-control" required placeholder="00.00 - 00.00"/>
                                                </div>
                                           </div>
                                      <div class="form-group">
                                              <label>Aksebility</label>
                                              <div>
                                              <textarea name="aksebility" required class="form-control" rows="1"></textarea>          
                                             </div>
                                           </div>
                                      <div class="form-group">
                                              <label>Fasilitas</label>
                                              <div>
                                              <textarea name="fasilitas" required class="form-control" rows="1"></textarea>          
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
                     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="pariwisata-edit">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Data</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                             </div>
                                        <form class="" action="javascript:void(0);" id="formEdit">
                                           <div class="modal-body">
                                                <div class="form-group">
                                                        <label>Nama Pariwisata</label>
                                                        <div>
                                                          <input type="hidden" name="simpan" value="1" id="simpan">
                                                          <input type="text" name="nama_pariwisata" class="form-control" required placeholder="Nama" id="nama_pariwisata"/>
                                                          <input type="hidden" name="id_wisata" id="id_wisata">
                                                          <input type="text" name="kode" id="kode" hidden>
                                                          </div>
                                                     </div>
                                                <div class="form-group">
                                                        <label>Jarak</label>
                                                        <div>
                                                          <input type="number" name="jarak" class="form-control" required placeholder="25km.." id="jarak"/>
                                                          </div>
                                                     </div>
                                                <div class="form-group">
                                                        <label>Harga Tiket Masuk</label>
                                                        <div>
                                                          <input type="text" name="tiket_masuk" class="form-control" required placeholder="Rp 0.00" id="tiket_masuk"/>
                                                          </div>
                                                     </div>
                                                <div class="form-group">
                                                        <label>Jam Operasional</label>
                                                        <div>
                                                          <input type="text" name="jam_operasional" class="form-control" required placeholder="00.00 - 00.00" id="jam_operasional"/>
                                                          </div>
                                                     </div>
                                                <div class="form-group">
                                                        <label>Aksebility</label>
                                                        <div>
                                                        <textarea name="aksebility" required class="form-control" rows="1" id="aksebility"></textarea>          
                                                       </div>
                                                     </div>
                                                <div class="form-group">
                                                        <label>Fasilitas</label>
                                                        <div>
                                                        <textarea name="fasilitas" required class="form-control" rows="1" id="fasilitas"></textarea>          
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
                               
                   