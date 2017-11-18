<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div id="tabel">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-control-label">
                                    <label for="email_address_2">Fakultas</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line" id="fakultas">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Prodi</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line" id="prodi">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Tahun Angkatan</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line" id="thn_angkatan">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-demo">
                                <button type="button" onclick="AddMahasiswa()" data-color="red" class="btn bg-red waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah Mahasiswa</button><br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <div class="card">
                        <div class="header" style="background: #2196F3;">
                            <h2>Data Mahasiswa</h2>
                        </div>
                        <div class="body">
                            <div id="alert2" style="display: none;" class="alert alert-info"></div>
                            
                            <div class="table-responsive">
                                <table id="mainTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
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
        <div class="formMahasiswa" style="display:none;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body"><br>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home_only_icon_title" data-toggle="tab">
                                    Biodata
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#profile_only_icon_title" data-toggle="tab">
                                    Orang Tua
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#messages_only_icon_title" data-toggle="tab">
                                    Sekolah/Perguruan Tinggi
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home_only_icon_title">
                                <div class="header" style="background: #2196F3;">
                                    <h2>Biodata Mahasiswa</h2>
                                </div>
                                <div class="body">
                                    <form method="post" id="BiodataForm">
                                    <input type="hidden" name="aksi" id="aksi">
                                    <div class="row clearfix">
                                        <div class="col-lg-6">
                                            <label for="email_address_3" style="color: #000">NIM</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="Otomatis By Sistem" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email_address_3" style="color: #000">Nama</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="nama" name="nama">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6">
                                            <label for="email_address_3" style="color: #000">Tahun Angkatan</label>
                                            <div class="form-group">
                                                <div class="form-line" id="thn_a">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="thn_angk" name="thn_angk">
                                        <div class="col-lg-6">
                                            <label for="email_address_3" style="color: #000">Jenis Kelamin</label>
                                            <div class="form-group">
                                                <div class="form-line" id="jk">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6">
                                            <label for="email_address_3" style="color: #000">Tempat Lahir</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="tempat" id="tempat" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email_address_3" style="color: #000">Tgl Lahir</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="tgl" id="tgl" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6">
                                            <label for="email_address_3" style="color: #000">Fakultas</label>
                                            <div class="form-group">
                                                <div class="form-line" id="fak">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email_address_3" style="color: #000">Prodi</label>
                                            <div class="form-group">
                                                <div class="form-line" id="prodi1">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_kon" id="id_kon">
                                     <div class="row clearfix">
                                        <div class="col-lg-12">
                                            <label for="email_address_3" style="color: #000">Alamat</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea class="form-control" name="alamat" id="alamat"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-success btn-block waves-effect">Simpan</button>
                                        </div>
                                        <div class="col-lg-3">
                                            <button class="btn btn-danger btn-block waves-effect" onclick="Batal()">Batal</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_only_icon_title">
                                    <b>Profile Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages_only_icon_title">
                                    <b>Message Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function nh(){
        var thn = $("#thn_a").val();
        $.ajax({
            url: 'http://127.0.0.1/siakad/doc/admin/mahasiswa/angkatan.php',
            type: 'POST',
            dataType: 'json',
            data: 'thn_a='+thn,
        })
        .done(function(fg) {
            $("#thn_angk").val(fg[0].keterangan);
        })  
    }
</script>
