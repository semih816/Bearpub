<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <title>Admin Login</title>
</head>
<?php include 'libs/function.php';?>
<?php include 'libs/ayar.php';?>

<?php

    $kullaniciAdi = $sifre = "";
    $kullaniciAdiErr = $sifreErr = $loginErr = "";

    if(isset($_POST["giris"])) {

        if(empty($_POST["kullaniciAdi"])) {
            $kullaniciAdiErr = "Lütfen Bir Kullanıcı Adı Giriniz";
        } else {
            $kullaniciAdi = $_POST["kullaniciAdi"];
        }

        if(empty($_POST["sifre"])) {
            $sifreErr = "Lütfen Bir Şifre Giriniz";
        } else {
            $sifre = $_POST["sifre"];
        }

        if(isset($kullaniciAdi) && isset($sifre)) {

            $secim = "SELECT * FROM admin WHERE kullaniciAdi = '$kullaniciAdi'";
            $calistir = mysqli_query($baglanti, $secim);
            $kayitsayisi = mysqli_num_rows($calistir);

            if ($kayitsayisi > 0) {
                $ilgiliKayit = mysqli_fetch_assoc($calistir);
                $haslisifre=$ilgiliKayit["sifre"];

                if(password_verify($sifre,$haslisifre)){

                    session_start();
                    $_SESSION["kullaniciAdi"]=$ilgiliKayit["kullaniciAdi"];
                    echo "<script>window.location.href='index.php';</script>";

                }else{
                echo '<div class="alert alert-danger">Şifreniz Yanlış</div>';
                }
                
            }else{
                echo '<div class="alert alert-danger">Kullanıcı Adı Yanlış</div>';
            }
        }
            mysqli_close($baglanti);
        }
        
?>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hoşgeldin Lütfen Giriş Yapın</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input name="kullaniciAdi" type="text" class="form-control form-control-user" placeholder="Kullanıcı Adı">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="sifre" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Şifre">
                                        </div>
                                        <button name="giris" class="btn btn-primary btn-user btn-block">Giriş</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</html>