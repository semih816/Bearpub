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
    <title>Bearpun Kayıt</title>
</head>

<?php include "../Proje/adminpanel/libs/function.php"; ?>
<?php include "../Proje/adminpanel/libs/ayar.php"; ?>
<?php
$usernameErr = $emailErr = $passwordErr = $repasswordErr = "";
    $username = $email = $password = $repassword = "";

    if($_SERVER["REQUEST_METHOD"]=="POST") {

        if(empty($_POST["username"])) {
            $usernameErr = "Kullanıcı Adı Boş Geçilemez.";
        } elseif(strlen($_POST["username"]) < 5 or strlen($_POST["username"]) > 20) {
            $usernameErr = "Kullanıcı Adı 5-20 karakter aralığında olmalıdır.";
        } elseif(!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST["username"])) {
            $usernameErr = "Kullanıcı Adı sadece rakam, harf ve alt çizgi karakterlerinden olmalıdır.";
        }
        else {

            $sql = "SELECT id from kullanicilar WHERE username=?";

            if($stmt = mysqli_prepare($baglanti,$sql)) {
                $param_username = trim($_POST["username"]);
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1) {
                        $usernameErr = "kullanıcı adı alınmış";
                    }  else {
                        $username = safe_html($_POST["username"]);
                    }
                } else {
                    echo mysqli_error($baglanti);
                    echo "hata oluştu";
                }
            }

        }

        if(empty($_POST["email"])) {
            $emailErr = "Email Zorunlu Alan.";
        } elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email hatalıdır";
        }else {

            $sql = "SELECT id from kullanicilar WHERE email=?";

            if($stmt = mysqli_prepare($baglanti,$sql)) {
                $param_email = trim($_POST["email"]);
                mysqli_stmt_bind_param($stmt, "s", $param_email);

                if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1) {
                        $emailErr = "Email Adı Alınmış";
                    }  else {
                        $email = safe_html($_POST["email"]);
                    }
                } else {
                    echo mysqli_error($baglanti);
                    echo "hata oluştu";
                }
            }
        }

        if(empty($_POST["password"])) {
            $passwordErr = "Şifre gerekli alan.";
        } else {
            $password = safe_html($_POST["password"]);
        }

        if($_POST["password"] != $_POST["repassword"]) {
            $repasswordErr = "Şifre Tekrar Alanı Eşleşmiyor.";
        } else {
            $repassword = safe_html($_POST["repassword"]);
        }

        if(empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($repasswordErr)) {
            $sql = "INSERT INTO kullanicilar(username,email,password) VALUES(?,?,?)";

            if($stmt = mysqli_prepare($baglanti, $sql)) {
                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

                if(mysqli_stmt_execute($stmt)) {
                    echo "<script>window.location.href='login.php';</script>";
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
                                        <h1 class="h4 text-gray-900 mb-4">Hoşgeldin Lütfen Kayıt Olun</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Kullanıcı Adı">
                                                <div class="text-danger"><?php echo $usernameErr; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                                placeholder="Email Adresiniz">
                                                <div class="text-danger"><?php echo $emailErr; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Şifre">
                                            <div class="text-danger"><?php echo $passwordErr; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="repassword" placeholder="Tekrar Şifre">
                                            <div class="text-danger"><?php echo $repasswordErr; ?></div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">Kayıt</button>
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