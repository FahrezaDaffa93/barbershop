<?php
require('koneksi.php');
if( isset($_POST['submit']) ){
    $userName = $_POST['txt_name'];
    $userAlamat = $_POST['txt_alamat'];
    $userNoTelpon = $_POST['txt_no_telpon'];
    $userEmail = $_POST['txt_email'];
    $userPosisi = $_POST['txt_posisi'];
    $userGaji = $_POST['txt_gaji'];

    $q = mysqli_query($koneksi, "SELECT*FROM karyawan WHERE email='$userEmail' AND no_telpon='$userNoTelpon' ");
    $cek = mysqli_num_rows($q);

    if($cek==0){
        $query = "INSERT INTO karyawan VALUES(null, '$userName', '$userAlamat', '$userNoTelpon','$userEmail','$userPosisi','$userGaji')";
        $result = mysqli_query($koneksi, $query);
        header('Location: dashboardKaryawan.php');
        if($query){
            $alert = "<div class='alert alert-success'> anda berhasil </div>";
        }
    }
else {
    $alert = "<div class='alert alert-danger'> Email atau No Telpon Sudah dipakai </div>";
}
    
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 107px;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-logo"></div>
                    <div class="col-lg-7 bg-form">
                        <div class="p-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">TAMBAHKAN KARYAWAN</h1>
                            </div>
                            <?php echo @$alert ?>
                            <form class="user" action="register_karyawan.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                        placeholder="Nama" name="txt_name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                        placeholder="Alamat" name="txt_alamat">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                        placeholder="No Telpon" name="txt_no_telpon">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email " name="txt_email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                        placeholder="Posisi" name="txt_posisi">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                        placeholder="Gaji" name="txt_gaji">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Tambah Karyawan</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>