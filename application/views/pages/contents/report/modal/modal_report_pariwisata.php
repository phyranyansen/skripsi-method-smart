
    <!-- sample modal content -->
<div id="RP-WST" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title mt-0" id="myModalLabel">Report Params</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <form action="javascript:void(0);" id="report-params">
                                                                <div class="modal-body">
                                                                <div class="form-group col-md-12">
                                                                    <label for="date">Data Alternatif</label>
                                                                    <select class="select2 mb-3 select2-multiple" style="width: 100%" name="alternatif[]" aria-placeholder="Pilih" multiple="multiple" data-placeholder="Choose" id="wisata">
                                                                      <option value="semua">Semua</option> 
                                                                      <?php foreach($wisata as $row){ ?>
                                                                        <option value="<?= $row['Kode_Pariwisata']; ?>"><?= $row['Nama_Pariwisata']; ?></option>
                                                                        <?php } ?>
                                                                    </select>  
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary waves-effect btn-sm" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm">Show</button>
                                                                </div>
                                                                </form>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->

