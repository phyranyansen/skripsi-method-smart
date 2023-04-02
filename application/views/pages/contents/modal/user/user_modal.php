
           <!-- Modal Tambah -->
           <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="pariwisata-tambah">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Data</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                   </div>
                                   <form class="" action="javascript:void(0);" id="formUser-Add">
                                           <div class="modal-body">
                                                <div class="form-group">
                                                        <label>Username</label>
                                                        <div>
                                                          <input type="text" name="username" class="form-control" required placeholder="Enter Username.." id="username_add" required/>
                                                         </div>
                                                     </div>
                                                <div class="form-group">
                                                        <label>Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="password" id="password_add" class="form-control" name="password"  placeholder="Enter New Password.." aria-describedby="password" id="password"/>
                                                            <span class="input-group-text cursor-pointer" id="toggle-password-add"><i class="mdi mdi-eye"></i></span>
                                                       </div>
                                                        <div>
                                                          <input type="password" name="passwordConf" class="form-control mt-2" placeholder="Enter Password Confirm.." id="passwordConf_add"/>
                                                          </div>
                                                          <span id="alert-add"></span>
                                                     </div>
                                                     <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="select2 form-control mb-3 custom-select" name="status" style="width: 100%; height:36px; background-color:lightsalmon" id="kriteria" required>
                                                                 <option value="1">Administrator</option>
                                                                 <option value="0">User Public</option>
                                                            
                                                       </select>
                                                  </div>
                                                     <div class="form-group">
                                                            <label>Aktivasi</label>
                                                            <select class="select2 form-control mb-3 custom-select" name="activated" style="width: 100%; height:36px; background-color:lightsalmon" id="kriteria" required>
                                                                 <option value="1">Aktif</option>
                                                                 <option value="0">Tidak Aktif</option>
                                                            
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
                     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="user-edit">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit User</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                             </div>
                                        <form class="" action="javascript:void(0);" id="formUser-Edit">
                                           <div class="modal-body">
                                                <div class="form-group">
                                                        <label>Username</label>
                                                        <div>
                                                          <input type="hidden" name="simpan" value="1" id="simpan">
                                                          <input type="hidden" name="id_login" id="id_login">
                                                          <input type="text" name="username" class="form-control" required placeholder="Enter Username.." id="username" required/>
                                                         </div>
                                                     </div>
                                                <div class="form-group">
                                                        <label>Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="password" id="password" class="form-control" name="password"  placeholder="Enter New Password.." aria-describedby="password" id="password" disabled/>
                                                            <span class="input-group-text cursor-pointer" id="toggle-password"><i class="mdi mdi-eye"></i></span>
                                                       </div>
                                                        <div>
                                                          <input type="password" name="passwordConf" class="form-control mt-2" placeholder="Enter Password Confirm.." id="passwordConf" disabled/>
                                                          </div>
                                                          <span id="alert-edit"></span><br>
                                                          <span><input type="checkbox" id="old"> <small class="text-warning">Ubah Password ?</small></span>
                                                     </div>
                                                     <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="select2 form-control mb-3 custom-select" name="status" style="width: 100%; height:36px; background-color:lightsalmon" id="kriteria" required>
                                                                 <option value="1">Administrator</option>
                                                                 <option value="0">User Public</option>
                                                            
                                                       </select>
                                                  </div>
                                                     <div class="form-group">
                                                            <label>Aktivasi</label>
                                                            <select class="select2 form-control mb-3 custom-select" name="activated" style="width: 100%; height:36px; background-color:lightsalmon" id="kriteria" required>
                                                                 <option value="1">Aktif</option>
                                                                 <option value="0">Tidak Aktif</option>
                                                            
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
                               

