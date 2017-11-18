var BaseUrl = "http://127.0.0.1/siakad/doc/admin/";


//----------------------------------- DOSEN ---------------------------------------------//
$(document).ready(function() {
	$(".row").hide('slow');
	$(".row").fadeIn('slow');
	$('.js-basic-example').DataTable({
		 "ajax"    : BaseUrl+"dosen/aksi_dosen.php?act=lihat",
         "columns" : [
         	  { "data" : "no"},
            { "data" : "id_dosen" },
            { "data" : "nidn" },
            { "data" : "nama" },
            { "data" : "jk" },
            { "data" : "agama" },
            { "data" : "tempat"},
            { "data" : "tgl_lahir"},
            { "data" : "Aksi"}
        ],
		responsive: true
	});
});

function ambildosenId(id){
	$("#table").fadeOut('slow');
	$("#formUpdateData").slideDown('slow');
	$.ajax({
		url: BaseUrl+'dosen/aksi_dosen.php?act=ambil&id='+id,
		type: 'GET',
		dataType: 'json',
		success: function(mn){ 
      console.log(mn);
      var html = '';
			$('#ak').val('update');
			$('#iddso').val(id);
			$('#nidn_update').val(mn[0].nidn);
			$('#nama_dos').val(mn[0].nama);
      $('#agamai').val(mn[0].agama);
      var htmla = '';
      if (mn[0].agama == "islam") {
          htmla += "<option value=''>Pilih Nama </option>";
          htmla += "<option value='islam' selected>Islam</option>";
          htmla += "<option value='kristen'>Kristen</option>";
          htmla += "<option value='katholik'>Katholik</option>";
          htmla += "<option value='hindu'>Hindu</option>";
          htmla += "<option value='budha'>Budha</option>";
          htmla += "<option value='konghucu'>Konghucu</option>";
          htmla += "<option value='kepercayaan terhadap tuhan YME'>Kepercayaan terhadap Tuhan YME</option>";
      }else if (mn[0].agama == "kristen") {
          htmla += "<option value=''>Pilih Nama </option>";
          htmla += "<option value='islam'>Islam</option>";
          htmla += "<option value='kristen' selected>Kristen</option>";
          htmla += "<option value='katholik'>Katholik</option>";
          htmla += "<option value='hindu'>Hindu</option>";
          htmla += "<option value='budha'>Budha</option>";
          htmla += "<option value='konghucu'>Konghucu</option>";
          htmla += "<option value='kepercayaan terhadap tuhan YME'>Kepercayaan terhadap Tuhan YME</option>";
      }else if (mn[0].agama == "katholik") {
          htmla += "<option value=''>Pilih Nama </option>";
          htmla += "<option value='islam'>Islam</option>";
          htmla += "<option value='kristen'>Kristen</option>";
          htmla += "<option value='katholik' selected>Katholik</option>";
          htmla += "<option value='hindu'>Hindu</option>";
          htmla += "<option value='budha'>Budha</option>";
          htmla += "<option value='konghucu'>Konghucu</option>";
          htmla += "<option value='kepercayaan terhadap tuhan YME'>Kepercayaan terhadap Tuhan YME</option>";
      }else if (mn[0].agama == "hindu"){
          htmla += "<option value=''>Pilih Nama </option>";
          htmla += "<option value='islam'>Islam</option>";
          htmla += "<option value='kristen'>Kristen</option>";
          htmla += "<option value='katholik'>Katholik</option>";
          htmla += "<option value='hindu' selected>Hindu</option>";
          htmla += "<option value='budha'>Budha</option>";
          htmla += "<option value='konghucu'>Konghucu</option>";
          htmla += "<option value='kepercayaan terhadap tuhan YME'>Kepercayaan terhadap Tuhan YME</option>";
      }else if (mn[0].agama == "budha"){
          htmla += "<option value=''>Pilih Nama </option>";
          htmla += "<option value='islam'>Islam</option>";
          htmla += "<option value='kristen'>Kristen</option>";
          htmla += "<option value='katholik'>Katholik</option>";
          htmla += "<option value='hindu'>Hindu</option>";
          htmla += "<option value='budha' selected>Budha</option>";
          htmla += "<option value='konghucu'>Konghucu</option>";
          htmla += "<option value='kepercayaan terhadap tuhan YME'>Kepercayaan terhadap Tuhan YME</option>";
      }else if (mn[0].agama == "konghucu"){
          htmla += "<option value=''>Pilih Nama </option>";
          htmla += "<option value='islam'>Islam</option>";
          htmla += "<option value='kristen'>Kristen</option>";
          htmla += "<option value='katholik'>Katholik</option>";
          htmla += "<option value='hindu'>Hindu</option>";
          htmla += "<option value='budha'>Budha</option>";
          htmla += "<option value='konghucu' selected>Konghucu</option>";
          htmla += "<option value='kepercayaan terhadap tuhan YME'>Kepercayaan terhadap Tuhan YME</option>";
      }else{
          htmla += "<option value=''>Pilih Nama </option>";
          htmla += "<option value='islam'>Islam</option>";
          htmla += "<option value='kristen'>Kristen</option>";
          htmla += "<option value='katholik'>Katholik</option>";
          htmla += "<option value='hindu'>Hindu</option>";
          htmla += "<option value='budha'>Budha</option>";
          htmla += "<option value='konghucu'>Konghucu</option>";
          htmla += "<option value='kepercayaan terhadap tuhan YME' selected>Kepercayaan terhadap Tuhan YME</option>";
      }
      
      $("#agamai").append('<select class="form-control show-tick">'+htmla+'</select>');
      $('#tmpt').val(mn[0].tempat);
			$('#tgl').val(mn[0].tgl_lahir);
        if (mn[0].jk == "L") {
            document.getElementById('jk').setAttribute("checked","checked");
        } else if (mn[0].jk == "P"){
            document.getElementById('jk').setAttribute("checked","checked");
        }
          document.getElementById('iddso').setAttribute("readonly","readonly"); 
        jQuery.getJSON(BaseUrl+'dosen/aksi_dosen.php?act=keilmuan', function(json) {
          html += "<option value=''>Pilih Nama </option>";
          $.each(json, function(index, val) {
            if (mn[0].id_bidang == val.id_bidang) {
                 html += '<option value="'+val.id_bidang+'" selected>'+val.nama_keilmuan+'</option>';
            }else{
                 html += '<option value="'+val.id_bidang+'">'+val.nama_keilmuan+'</option>';
            }
          });
          $("#ilmu").append('<select class="form-control show-tick">'+html+'</select>');
        });
        
		}
	})	
}

function TambahDosen(){
	$('#aksi').val('tambah');
	$("#table").fadeOut('slow');
	$("#formData").slideDown('slow');
  var html = '';
  $.ajax({
        url : BaseUrl+'dosen/aksi_dosen.php?act=keilmuan',
        type: 'POST',
        data: {},
        dataType: 'json',
        success: function(data){
           for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i].id_bidang+'">'+data[i].nama_keilmuan+'</option>';
           }
              $('#bidang').append('<select class="form-control show-tick" name="bidang">'+html+'</select>');
            
         //sukses
        }
    });
}

$(function () {
    $('#formnya').validate({
       rules: {
          id_dosen: {
            required: true,
            minlength: 7,
          },
          nama: {
            required: true,
            minlength: 5
          },
          tmp_lahir: {
            required: true,
            minlength: 2
          }
        },
        messages: {
          id_dosen:{
            required: "Masukkan ID Dosen",
            minlength: "ID Dosen Minimal 7 Karakter"
          },
           nama: {
            required: "Masukkan Nama Lengkap Anda",
            minlength: "Tempat Lahir minimal 5 karakter"
          },
          tmp_lahir: {
            required: "Masukkan Tempat Lahir Anda",
            minlength: "Tempat Lahir minimal 4 karakter"
          },
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          // Add `has-feedback` class to the parent div.form-group
          // in order to add icons to inputs
          element.parents( ".col-sm-5" ).addClass( "has-feedback" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }

          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !element.next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
          }
        },
        success: function ( label, element ) {
          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !$( element ).next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $(element).parents( ".form-line" ).addClass("error" ).removeClass( "success" );
          $(element).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
          $(element).parents( ".form-line" ).addClass( "success" ).removeClass( "error" );
          $(element).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    });
});


$(document).on('submit', '#formnya', function(e){
  e.preventDefault();
  	$.ajax({
      url: BaseUrl+'dosen/aksi_dosen.php?act=simpan',
      type: 'POST',
      dataType: 'json',
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(simpan){
        if (simpan.sukses) {
          swal('Perhatian','Simpan Berhasil', 'success');
        }else{
          swal('Perhatian','Simpan Gagal', 'error');
        }
          $('#table').load('Dosen1');
      }
    })
});


//--------------------------------------- END DOSEN ------------------------------------//
//---------------------------------------- FAKULTAS ------------------------------------//
$(document).ready(function(){
	$('#tabel').hide();
	$('#tabel').fadeIn('slow');
    var html = '';
    $.ajax({
        url: BaseUrl+'fakultas/aksi.php?act=tampil',
        type: 'POST',
        dataType: 'json',
        success: function(data){
            var c = 1;
            $.each(data, function(a, b) {
                 html += '<tr>';
                 html += '<td>'+c+++ '</td>';
                 html += '<td>'+b.nama_fakultas+ '</td>';
                 html += '<td>'+b.nama_dekan+ '</td>';
                 html += '<td><a href="#" class="btn btn-link" onclick= ambilId("'+b.id_fakultas+'")><i class="material-icons">create</i></td>';
                 html += '<td><a href="javascript(0)" class="btn btn-link" id="delete" data-id="'+b.id_fakultas+'"><i class="material-icons">delete</i></td>';
                 html += '</tr>';
            });

            $("#Fakultasw").append(html);
        }
    })
});

function TambahFakultas(){
	$('#aksi').val('tambah');
	$('#tabel').fadeOut('slow');
	$('#formData').slideDown('slow');
}

$(function () {
    $('#formfakultas').validate({
       rules: {
          nama_fakultas: {
            required: true,
            minlength: 2,
          },
          nama_dekan: {
            required: true,
            minlength: 7
          }
        },
        messages: {
          nama_fakultas:{
            required: "Masukkan Nama Fakultas",
            minlength: "Nama Fakultas Minimal 2 Karakter"
          },
          nama_dekan: {
            required: "Masukkan Nama Dekan Fakultas",
            minlength: "Nama Dekan Fakultas minimal 7 karakter"
          },
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          // Add `has-feedback` class to the parent div.form-group
          // in order to add icons to inputs
          element.parents( ".col-sm-5" ).addClass( "has-feedback" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }

          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !element.next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
          }
        },
        success: function ( label, element ) {
          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !$( element ).next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $(element).parents( ".form-line" ).addClass("error" ).removeClass( "success" );
          $(element).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
          $(element).parents( ".form-line" ).addClass( "success" ).removeClass( "error" );
          $(element).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    });
});

$(document).on('submit', '#formfakultas', function(e){
	e.preventDefault();
	$.ajax({
		url: BaseUrl+'fakultas/aksi.php?act=simpan',
		type: 'POST',
		data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
          if (data.sukses = true) {
              swal('Perhatian!!', 'Data berhasil disimpan', 'success');
          }else{
              swal('Perhatian!!', 'Data Gagal disimpan', 'error'); 
          }
      	 $('#formData').fadeOut(3000);
         $('#tabel').fadeIn(3000, function() {
            location.reload();
          });
        }
	})
	return false;

});

function ambilId(id){
	$('#formData').slideDown('slow');
	$('#tabel').fadeOut('slow');
    console.log(id);
	$.ajax({
        type: 'GET',
        dataType:'JSON',
        url: BaseUrl+'fakultas/aksi.php?act=edit&id='+id,
        success:function(data){
        	console.log(data);
			       $("#aksi").val("update"); 
			       $("#id_fakultas").val(id);
			       $("#nama_fakultas").val(data[0].nama_fakultas);
			       $("#nama_dekan").val(data[0].nama_dekan);
            // $("#f_nik").val(data.id_nik);
            // $("#f_nama").val(data.nm_user);
            // $("#f_alamat").val(data.alamat);
            // $("#f_alamat").val(data.alamat);
            // $("#f_level").val(data.level);
            // $("#f_user").val(data.user); 
            // if (data.jkel == "L") {
            //     document.getElementById('f_laki').setAttribute("checked","checked");
            // } else if (data.jkel == "P"){
            //     document.getElementById('f_perempuan').setAttribute("checked","checked");
            // }
            // document.getElementById('f_nik').setAttribute("readonly","readonly"); 
        }
    });
}

$(document).on('click', '#delete', function(e) {
    var fakultasId = $(this).data('id');
    SwalDelete(fakultasId);
    e.preventDefault();
    
});
	
function SwalDelete(fakultasId){
  
  swal({
   title: 'Apa Kau Yakin?',
   text: "Anda tidak akan bisa mengembalikan Data ini!",
   type: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Yakin, Hapus Data Ini!',
   showLoaderOnConfirm: true,
     
   preConfirm: function() {
     return new Promise(function(resolve) {
        $.ajax({
        url: BaseUrl+'fakultas/aksi.php?act=hapus',
        type: 'POST',
        data: 'delete='+fakultasId,
        dataType: 'json'
        })
        .done(function(response){
         swal('Deleted!', 'Data Berhasil dihapus', response.status);
         if (response.status == "success") {
            location.reload("#tabel");
         }
        })
        .fail(function(){
         swal('Deleted!', 'Data Gagal dihapus', response.status);
        });
     });
      },
   allowOutsideClick: false     
  }); 
 }
// //-------------------------------------- END FAKULTAS ----------------------------------//
// //----------------------------------------- PRODI --------------------------------------//
$(document).ready(function() {
  $('.js-basic').DataTable({
     "ajax"    : BaseUrl+"prodi/aksi.php?act=lihat",
         "columns" : [
            { "data" : "no"},
            { "data" : "nama_fakultas" },
            { "data" : "nama_prodi" },
            { "data" : "nama_kaprodi" },
            { "data" : "Aksi"}
        ],
    responsive: true
  });
});

function TambahProdi(){
	$('#aksi').val('tambah');
	$('#tabel').fadeOut('slow');
	$('#formData').slideDown(3000);
  var n = "<option value=''>Pilih Nama Fakultas</option>";
  $.ajax({
    url: BaseUrl+'prodi/aksi.php?act=ambilfakultas',
    type: 'POST',
    dataType: 'json',
    data: {},
    success: function(tampil){
      var t = '';
      $.each(tampil, function(index, val) {
         t += "<option value='"+val.id_fakultas+"'>"+val.nama_fakultas+' - '+val.nama_dekan+"</option>";
      });

      $("#fakultasw").append('<select class="form-control">'+n+t+'</select>');
    }
  }) 
}

$(function () {
    $('#formprodi').validate({
       rules: {
          nama_prodi: {
            required: true,
            minlength: 7,
          },
          nama_kaprodi: {
            required: true,
            minlength: 7
          }
        },
        messages: {
          nama_fakultas:{
            required: "Masukkan Nama Prodi",
            minlength: "Nama Prodi Minimal 7 Karakter"
          },
          nama_dekan: {
            required: "Masukkan Nama Kaprodi",
            minlength: "Nama Nama Kaprodi minimal 7 karakter"
          },
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          // Add `has-feedback` class to the parent div.form-group
          // in order to add icons to inputs
          element.parents( ".col-sm-5" ).addClass( "has-feedback" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }

          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !element.next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
          }
        },
        success: function ( label, element ) {
          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !$( element ).next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $(element).parents( ".form-line" ).addClass("error" ).removeClass( "success" );
          $(element).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
          $(element).parents( ".form-line" ).addClass( "success" ).removeClass( "error" );
          $(element).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    });
});

$(document).on('submit', '#formprodi', function(e) {
	e.preventDefault();
	$.ajax({
		url: BaseUrl+'prodi/aksi.php?act=save',
		type: 'POST',
		data:  new FormData(this),
		dataType: 'JSON',
    contentType: false,
    cache: false,
    processData:false,
    success: function(data){
      console.log(data);
    	if (data.success == true) {
    		swal('Perhatian', 'data berhasil disimpan', 'success');
    	}else{
    		swal('Perhatian', 'data gagal disimpan', 'error');
    	}
    	 // $('#alert').fadeIn(3000);
    	 // $('#alert').html(data).fadeOut(3000);
    	 $('#formData').fadeOut(3000);
    	 $('#tabel').fadeIn(6000, function() {
    	 	location.reload();
    	 });
    	 document.getElementById('formnya').reset();
    }
	})
	
});

function ambilprodiId(id){
	$('#formUpdateData').slideDown('slow');
	$('#tabel').fadeOut('slow');
	var h = '';
	$.ajax({
		url: BaseUrl+'prodi/aksi.php?act=ambilprodi&id_o='+id,
		type: 'GET',
		dataType: 'json',
		success: function(data){
			$("#aksi").val('updateprodi');
			$("#id").val(id);
			$("#nama_prodi1").val(data[0].nama_prodi);
			$("#nama_kaprodi1").val(data[0].nama_kaprodi);
      jQuery.getJSON(BaseUrl+'prodi/aksi.php?act=ambilfakultas', function(json) {
          h += "<option value=''>Pilih Nama </option>";
          $.each(json, function(index, val) {
            if (data[0].id_fakultas == val.id_fakultas) {
                 h += '<option value="'+val.id_fakultas+'" selected>'+val.nama_fakultas+'</option>';
            }else{
                 h += '<option value="'+val.id_fakultas+'">'+val.nama_fakultas+'</option>';
            }
          });
          $("#fak").append('<select class="form-control show-tick" name="fv">'+h+'</select>');
        });     
		}
	})
	return false;
}

$(document).on('submit', '#formpupdateprodi', function(event) {
  event.preventDefault();
  $.ajax({
    url: 'http://127.0.0.1/siakad/doc/admin/prodi/aksi.php?act=ambilprodi',
    type: 'POST',
    data:  new FormData(this),
    dataType: 'JSON',
    contentType: false,
    cache: false,
    processData:false,
    success: function(update){
      if (update.sukses == true) {
        swal('Perhatian!!', 'Update Berhasil', 'success');
      }else{
        swal('Perhatian!!', 'Update Gagal', 'error');
      }
    }
  })
});
// //-------------------------------------- END PRODI -------------------------------------//
// //-------------------------------------- MAHASISWA -------------------------------------//
$(document).ready(function() {
  $('#formMahasiswa').hide('slow');
  var TableMahasiswa = $('#mainTable').editableTableWidget();
    $.ajax({
      url: BaseUrl+'mahasiswa/aksi_mahasiswa.php?aksi=lihat',
      type: 'POST',
      dataType: 'json',
      success : function(data){
        var n = 1;
        var a = "";
        $.each(data, function(index, val) {
          a += "<tr>";
            a+= "<td>"+ n++ +"</td>";
            a+= "<td>"+val.Nim+"</td>";
            a+= "<td>"+val.Nama+"</td>";
            a+= "<td>"+val.JenisKelamin+"</td>";
            a+= "<td>"+val.Agama+"</td>";
            a+= "<td><a href='' class='btn bg-amber btn-circle waves-effect'><i class='material-icons'>create</i></a></td>";
          a += "<tr>";
        });
        $(TableMahasiswa).append(a);
      }
  });
    $.getJSON(BaseUrl+'mahasiswa/aksi_mahasiswa.php?aksi=fak', function(t) {
        var bn = "";
        $.each(t, function(a, b) {
           bn += "<option value='"+b.id_fakultas+"'>"+b.nama_fakultas+"</option>";
        });
        $("#fakultas").append("<select class='form-control'>"+bn+"</select>");
    });
    $.getJSON(BaseUrl+'mahasiswa/aksi_mahasiswa.php?aksi=prodi', function(s) {
        var n = '';
        $.each(s, function(i, val) {
           n += "<option value='"+val.id_prodi+"'>"+val.nama_prodi+"</option>";
        });
        $("#prodi").html("<select class='form-control'>"+n+"</select>");
    });
    $.getJSON(BaseUrl+'mahasiswa/aksi_mahasiswa.php?aksi=tahun_angkatan', function(s) {
        var n = '';
        $.each(s, function(i, val) {
           n += "<option value='"+val.id_tahun_angkatan+"'>"+val.keterangan+"</option>";
        });
        $("#thn_angkatan").html("<select class='form-control'>"+n+"</select>");
    });
});

function Batal(){
  $(".formMahasiswa").hide(3000);
  $("#tabel").fadeIn(2000);
  $("#BiodataForm").reset();
}

function AddMahasiswa(){
  $("#tabel").hide('slow');
  $(".formMahasiswa").slideDown('slow');
   $.ajax({
     url: BaseUrl+'mahasiswa/aksi_mahasiswa.php?aksi=tahun_angkatan',
     type: 'POST',
     dataType: 'json',
     success: function(tM){
       var mb = '';
          mb += "<option value=''>Pilih Tahun Angkatan</option>";
       $.each(tM, function(index, x) {
          mb += "<option value='"+x.id_tahun_angkatan+"'>"+x.keterangan+"</option>";
       });
       $('#tahun_a').append('<select class="form-control" onchange="nh()" id="thn_a" name="thn_a">'+mb+'</select>');
     }
   })
   var b = '';
      b += '<option value="L">Laki-Laki</option>';
      b += '<option value="P">Peremuan</option>';
    $('#jk').html('<select class="form-control" id="jkq" name="jkq">'+b+'</select>');
    $.getJSON(BaseUrl+'mahasiswa/aksi_mahasiswa.php?aksi=fak', function(t) {
        var z = "";
        $.each(t, function(a, b) {
           z += "<option value='"+b.id_fakultas+"'>"+b.nama_fakultas+"</option>";
        });
        $("#fak").append("<select class='form-control' onchange='otomatis()' id='idf' name='idf'>"+z+"</select>");
    });
}
function otomatis(){
    var id_f = $("#idf").val();
    $.ajax({
        url: BaseUrl+'mahasiswa/detail.php',
        type: 'POST',
        dataType: 'json',
        data: "idf="+id_f,
        success: function(dtoa){
          console.log(dtoa);
           var g = '';
           $.each(dtoa, function(index, val) {
              g += "<option value='"+val.id_prodi+"'>"+val.nama_prodi+"</option>";
           });
           $('#prodi1').html("<select class='form-control' id='pd' name='pd'>"+g+"</select>");
           $('#id_kon').val(dtoa[0].konsentrasi_id);
        }
    })
}

$(document).on('submit', '#BiodataForm', function(e) {
  e.preventDefault();
   $.ajax({
        url: BaseUrl+"mahasiswa/aksi_mahasiswa.php?aksi=Simpan",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){                 
            if (data.sukses== true) {
              swal('Perhatian!!','Simpan Berhasil','success');
            }else{
              swal('Perhatian!!','Simpan Gagal','error');
            }
        }           
    });
});
//-------------------------------------- END MAHASISWA ----------------------------------//
//-------------------------------------- KELAS -----------------------------------------//
$(document).ready(function() {
  var tableDataKelas = $('.js-example').DataTable({
     "ajax"    : BaseUrl+"kelas/aksi.php?aksi=lihat",
         "columns" : [
            { "data" : "no"},
            { "data" : "id_kelas" },
            { "data" : "jenis_kelas" },
            { "data" : "kuota" },
            {"defaultContent": "<button type='button' id='UpdateKelas' class='btn bg-amber btn-circle waves-effect'><span class='glyphicon glyphicon-pencil'></span></button>"}
        ],
    responsive: true
  });

  $('.js-example tbody').on('click', 'button#UpdateKelas', function () {
        var data = tableDataKelas.row( $(this).parents('tr') ).data();
        $('#editModalDataKelas .modal-content').removeAttr('class').addClass('modal-content modal-col-amber');
        $('#editModalDataKelas').modal('show');
        $('#editModalDataKelas input#id_kelas').val(data['id_kelas']);
        $('#editModalDataKelas input#jenis').val(data['jenis_kelas']);
        $('#editModalDataKelas input#isi_kelas').val(data['kuota']);
    });
  
});

$(".TambahKelas").click(function(e) {
  e.preventDefault();
  var nama_kelas = $('#nama_kelas').val();
  var isi_kelas  = $('#isi_kelas').val();
  $.ajax({
    url: BaseUrl+'kelas/aksi.php?aksi=TambahKelas',
    type: 'POST',
    dataType: 'json',
    data: {'nama_kelas': nama_kelas, 'isi_kelas':isi_kelas},
    success: function(simpan){
        if (simpan.sukses==true) {
            swal('Perhatian!!','Kelas Berhasil ditambahkan', 'success');
        }else{
            swal('Perhatian!!','Kelas Gagal ditambahkan', 'error');
        }
          $("#mdModal").fadeOut(3000, function() {
            document.location='Kelas';
          });
    }
  })
});

//-------------------------------------- END KELAS --------------------------------------//
//-------------------------------------- RUANG ------------------------------------------//
$(document).ready(function(){
  var TableRuang = $(".dataruang-example").DataTable({
    'ajax': BaseUrl+'ruang/aksi_ruang.php?aksi=lihat',
    'columns':[
      {'data':'no'},
      {'data':'id_ruang'},
      {'data':'nama_ruang'},
      {'defaultContent':'<button id="EditRuang" class="btn bg-amber waves-effect"><span class="glyphicon glyphicon-pencil"></span>Update</button>'}
    ]
  }); 
  $('.dataruang-example tbody').on('click', 'button#EditRuang', function() {
     var data = TableRuang.row( $(this).parents('tr') ).data();
    $('#editModalDataRuang .modal-content').removeAttr('class').addClass('modal-content modal-col-amber');
    $('#editModalDataRuang').modal('show');
    $('#editModalDataRuang input#id').val(data['id_ruang']);
    $('#editModalDataRuang input#ruang').val(data['nama_ruang']);
  });
});

$(".Update-Ruangan").click(function(event) {
  var id   = $("#id").val();
  var nama = $("#ruang").val();
  $.ajax({
    url: BaseUrl+'ruang/aksi_ruang.php?aksi=UpdateRuang',
    type: 'POST',
    dataType: 'json',
    data: {'id': id, 'ruang':nama},
    success: function(update){
      if (update.berhasil==true) {
        swal("Perhatian!!","Data Ruang Berhasil diupdate","success");
      }else{
        swal("Perhatian!!","Data Ruang Gagal diupdate","error");
      }
      $("#editModalDataRuang").modal('hide');      
      $("#editModalDataRuang").hide(3000, function() {
         document.location='Ruang';
      });
    }
  })
});

$(".Tambah-Ruangan").click(function(event) {
  var nama_ruang = $("#nama_ruang").val();
  $.ajax({
    url: BaseUrl+'ruang/aksi_ruang.php?aksi=TambahRuang',
    type: 'POST',
    dataType: 'json',
    data: {'nama_ruang': nama_ruang},
    success: function(tambah){
       if (tambah.sukses == true) {
           swal('Perhatian!!','Data Ruang Berhasil ditambahkan','success');
       }else{
           swal('Peratian!!','Data Ruang Gagal Ditambahkan','error');
       }
       $('#mdModal').modal('hide');
       $('#mdModal').hide(3000, function() {
          document.location='Ruang';
       });

    }
  })
});
//-------------------------------------- END RUANG -------------------------------------//
