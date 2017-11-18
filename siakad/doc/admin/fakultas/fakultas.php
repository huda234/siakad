<section class="content">
	<div class="container-fluid">
		<div id="formData" style="display:none;">
			<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="background: blue">
							<h2>
							Form Fakultas
							</h2>
						</div>
                        <div class="body">
                        	<div id="alert" style="display: none" class="alert alert-info"></div>
                            <form class="form-horizontal" id="formfakultas" method="POST">
                            	<input type="hidden" id="aksi" name="aksi" />
                            	<input type="hidden" id="id_fakultas" name="id_fakultas">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Fakultas</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" placeholder="Masukkan Nama Fakultas">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Dekan Fakultas</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nama_dekan" name="nama_dekan" placeholder="Masukkan Nama Dekan Fakultas">
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
						<div class="header" style="background: blue">
							<h2>
							Setting Fakultas
							</h2>
						</div>
						<div class="body">
							<!-- <div id="alert2" style="display: none;" class="alert alert-info"></div> -->
							<button onclick="TambahFakultas()" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah Fakultas</button><br><br>
							<table id="data-Table" class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Fakultas</th>
										<th>Nama Dekan Fakultas</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="Fakultasw">
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>