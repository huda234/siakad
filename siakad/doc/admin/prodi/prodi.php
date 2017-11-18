<section class="content">
	<div class="container-fluid">
		<div id="formData" style="display:none;">
			<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="background: blue">
							<h2>
							Form Prodi
							</h2>
						</div>
                        <div class="body">
                        	<div id="alert" style="display: none" class="alert alert-info"></div>
                            <form class="form-horizontal" id="formprodi" method="POST">
                            	<input type="hidden" id="aksi" name="aksi" />
                            	<input type="hidden" id="id_prodi" name="id_prodi">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Fakultas</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line" id="fakultasw">
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Prodi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Masukkan Nama Prodi">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Ka Prodi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nama_kaprodi" name="nama_kaprodi" placeholder="Masukkan Nama Kaprodi">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
		</div>
		<div class="row">
			<div id="tabel">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header" style="background: #2196F3;">
							<h2>
							Setting Prodi
							</h2>
						</div>
						<div class="body">
							<div id="alert2" style="display: none;" class="alert alert-info"></div>
							<button onclick="TambahProdi()" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span>Tambah Prodi</button><br><br>
							<div class="table-responsive">
                                <table class="js-basic table table-bordered table-striped table-hover dataTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Fakultas</th>
										<th>Nama Prodi</th>
										<th>Nama ka Prodi</th>
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
        <div id="formUpdateData" style="display:none;">
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="background: blue">
                            <h2>
                            Form Prodi
                            </h2>
                        </div>
                        <div class="body">
                            <div id="alert" style="display: none" class="alert alert-info"></div>
                            <form class="form-horizontal" id="formpupdateprodi" method="POST">
                                <input type="hidden" id="aksi" name="aksi" />
                                <input type="text" id="id" name="id">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Fakultas</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line" id="fak">
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Prodi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nama_prodi1" name="nama_prodi1" placeholder="Masukkan Nama Prodi">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Ka Prodi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nama_kaprodi1" name="nama_kaprodi1" placeholder="Masukkan Nama Kaprodi">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
        </div>
	</div>
</section>