<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div id="tabel">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header" style="background: #2196F3;">
							<h2>
							   Data Ruang
							</h2>
						</div>
						<div class="body">
							 <div class="button-demo js-modal-buttons">
							 <button type="button" data-color="blue" class="btn bg-red waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah Ruang</button><br><br>
							</div>
							<div class="table-responsive">
                                <table class="dataruang-example table table-bordered table-striped table-hover dataTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Ruang</th>
										<th>Nama Ruang</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- For Material Design Colors -->
            <div class="modal fade" id="editModalDataRuang" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Update Ruang</h4>
                        </div>
                        <div class="modal-body" style="background-color: #fff;">
                           <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_3" style="color: #000">ID Ruang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="id" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2" style="color: #000">Nama Ruang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="ruang" placeholder="Masukkan Nama Kelas">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect Update-Ruangan">Simpan</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

         <!-- For Material Design Colors -->
            <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Ruang</h4>
                        </div>
                        <div class="modal-body" style="background-color: #fff;">
                           <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_3" style="color: #000">ID Ruang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="Otomatis By Sistem" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2" style="color: #000">Nama Ruang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nama_ruang" placeholder="Masukkan Nama Kelas">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect Tambah-Ruangan">Simpan</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
	</div>
</section>
