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
    <title>Beaupub Admin Kayıt</title>
</head>

<?php include "libs/function.php"; ?>
<?php include "libs/ayar.php"; ?>
<?php
    $kullaniciAdiErr = $emailErr = $sifreErr = $resifreErr = "";
    $kullaniciAdi = $email = $sifre = $resifre = "";

    if($_SERVER["REQUEST_METHOD"]=="POST") {

        if(empty($_POST["kullaniciAdi"])) {
            $kullaniciAdiErr = "kullaniciAdi gerekli alan.";
        } elseif(strlen($_POST["kullaniciAdi"]) < 5 or strlen($_POST["kullaniciAdi"]) > 20) {
            $kullaniciAdiErr = "kullaniciAdi 5-20 karakter aralığında olmalıdır.";
        } elseif(!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST["kullaniciAdi"])) {
            $kullaniciAdiErr = "kullaniciAdi sadece rakam, harf ve alt çizgi karakterlerinden olmalıdır.";
        }
        else {

            $sql = "SELECT id from admin WHERE kullaniciAdi=?";

            if($stmt = mysqli_prepare($baglanti,$sql)) {
                $param_kullaniciAdi = trim($_POST["kullaniciAdi"]);
                mysqli_stmt_bind_param($stmt, "s", $param_kullaniciAdi);

                if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1) {
                        $kullaniciAdiErr = "kullanıcı adı alınmış";
                    }  else {
                        $kullaniciAdi = safe_html($_POST["kullaniciAdi"]);
                    }
                } else {
                    echo mysqli_error($baglanti);
                    echo "hata oluştu";
                }
            }
        }

        if(empty($_POST["sifre"])) {
            $sifreErr = "sifre gerekli alan.";
        } else {
            $sifre = safe_html($_POST["sifre"]);
        }


        if(empty($kullaniciAdiErr) && empty($sifreErr)) {
            $sql = "INSERT INTO admin(kullaniciAdi,sifre) VALUES(?,?)";

            if($stmt = mysqli_prepare($baglanti, $sql)) {
                $param_kullaniciAdi = $kullaniciAdi;
                $param_sifre = password_hash($sifre, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "ss", $param_kullaniciAdi, $param_sifre);

                if(mysqli_stmt_execute($stmt)) {
                    echo "<script>window.location.href='index.php';</script>";
                } else {
                    echo mysqli_error($baglanti);
                    echo "<br>";
                    echo "hata oluştu";
                }
            }
        }
        
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
                                        <h1 class="h4 text-gray-900 mb-4">Hoşgeldiniz Admin Kayıt Edin</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="kullaniciAdi" class="form-control form-control-user" placeholder="Kullanıcı Adı">
                                                <div class="text-danger"><?php echo $kullaniciAdiErr; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="sifre" class="form-control form-control-user"
                                                id="exampleInputsifre" name="sifre" placeholder="Şifre">
                                            <div class="text-danger"><?php echo $sifreErr; ?></div>
                                        </div>
                                        <button  class="btn btn-primary btn-user btn-block">Kayıt</button>
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