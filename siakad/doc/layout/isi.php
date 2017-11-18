<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Sistem Informasi Akademik</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right"><br>
                    <!-- Call Search -->
                    <button class="btn bg-red waves-effect" onclick="document.location='logout'"><i class="material-icons">clear</i>Logout</button>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    
                    <!-- #END# Tasks -->
                    <!-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../images/user.png" width="64" height="64" alt="User" />
                </div>
                <div class="info-container">
                    <?php 
                      
                            $sql = $con2->query("SELECT * FROM mahasiswa WHERE Nim='$user'");
                       
                            while ($data = $sql->fetch_array()) {
                                $f = $data['Nama'];
                                $nim = $data['Nim'];
                                $g = base64_encode($nim);
                                $r = str_replace("=", "", $g);
                            }
                     ?>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nama : <b><?php echo $f; ?></b></div>
                    <div class="email">Nim : <b><?= $nim ?></b></div>
                    
                </div>
            </div>
            <!-- #User Info -->

            <?php
                if ($hak=='admin') { 
                    include_once "admin/menu.php"; 
                }else if ($hak=='mahasiswa') {
                    include_once "mahasiswa/menu.php";
                }else{
                    include_once "dosen/menu.php";
                }
            ?>
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
   