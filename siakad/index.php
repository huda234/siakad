<?php 
    require_once __DIR__.'/config/koneksi.php';
    require_once __DIR__.'/config/encrypt.php';
    session_start();
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Siakad</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

     <!-- Google Fonts -->
    <link href="css/googleapis.css" rel="stylesheet" type="text/css">
    <link href="css/google_lapis.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Siakad<b></b></a>
        </div>
        <?php 
          ob_start();
        if (isset($_POST['masuk'])) {
                function anti_inject($data){
                    $saring = mysql_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
                    return $saring;
                }
                  $data   = anti_inject($_POST['pass']);
                  $userid = anti_inject($_POST['user']);
                  $passid = md5(enkripsi($data, $Kunci));
                  $akun   ="A";
                  $gh     = anti_inject($_POST['capta']);
                  if ($gh != $_POST['hj']) {
                      echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="false">×</span>
                              </button>
                              <strong>Perhatian!</strong>Maaf Kode Captpcha Salah Silahkan Coba lagi.
                            </div>';
                        header("refresh:2");
                  }else{
                    $sql = mysqli_query($con2, "SELECT * FROM login WHERE username='$userid' AND password='$passid'");
                    $jumlah = mysqli_num_rows($sql);
                    if ($jumlah > 0) {
                      while ($data = $sql->fetch_array()) {
                        $f = $data['username'].'-'.$data['password'].'-'.$data['level'];
                      }
                      $_SESSION['Aw23Vg']  = enkripsi($f, $Kunci);
                       echo "<script>document.location='masuk.php'</script>";
                    }else{
                              echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Perhatian!</strong>Maaf Username Dan Password Salah Silahkan Coba lagi.
                              </div>';
                              
                    }
                    echo "<meta http-equiv='refresh' content='5'>";
                  }
        }

     ?>
        <div class="card">
        
            <div class="body">
                <form id="sign-in" method="POST">
                    <div class="msg">Login Siakad</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user" id="username" placeholder="Username" required autofocus><br><span id="pesan"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <?php 
                            $n1    = rand(0, 9);
                            $n2    = rand(0, 9);
                            $n3    = $n1 + $n2;
                            $hasil = $n1.' + '.$n2;
                         ?>
                         <input type="hidden" name="hj" value="<?= $n3 ?>">
                        <div class="form-line">
                            <input type="text" class="form-control" value="<?= $hasil?>" readonly>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_open</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="capta">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <label for="rememberme"></label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="masuk" type="submit">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="js/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>