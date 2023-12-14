<?php
    require "libs/function.php";
?>
<?php include 'inc/header.php';  
?>
<div id="wrapper">
<?php include 'inc/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

<?php session_start(); include 'inc/navbar.php'; ?>
<?php include "inc/header.php" ?>

<?php
    $baslikErr = $baslik = "";
    $altBaslikErr = $altBaslik = "";
    $icerikErr = $icerik = "";


    if($_SERVER["REQUEST_METHOD"]=="POST") {

        if(empty($_POST["baslik"])) {
            $baslikErr = "Başlık Boş Geçilemez.";
        } else {
            $baslik = safe_html($_POST["baslik"]);
        }
        if(empty($_POST["altBaslik"])) {
            $altBaslikErr = "Alt Başlık Boş Geçilemez.";
        } else {
            $altBaslik = safe_html($_POST["altBaslik"]);
        }
        if(empty($_POST["icerik"])) {
            $icerikErr = "İçerik Boş Geçilemez.";
        } else {
            $icerik = safe_html($_POST["icerik"]);
        }
        if(empty($baslikErr) && empty($altBaslikErr) && empty($icerikErr)) {
            createPost($baslik, $altBaslik, $icerik);
            $_SESSION["message"] = "Gönderi Başarıyla Eklendi";
            $_SESSION["type"] = "success";
            echo "<script> window.location.href='admin-post.php';</script>";
        }
    }
?>

<div class="container my-3">
    <div class="row">
    <div class="col-6">
        <h1 class="h3 mb-2 text-gray-800">Gönderi Ekle</h1>
    </div>
        <div class="col-12">
            <div class="card card-body">
            <form method="post">
                    <div class="mb-3">
                        <label for="baslik">Başlık</label>
                        <input type="text" name="baslik" class="form-control" value="<?php echo $baslik;?>">
                        <div class="text-danger"><?php echo $baslikErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="altBaslik">Alt Başlık</label>
                        <input name="altBaslik" class="form-control" value="<?php echo $altBaslik;?>">
                        <div class="text-danger"><?php echo $altBaslikErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="icerik">İçerik</label>
                        <textarea name="icerik" class="form-control"><?php echo $icerik;?></textarea>
                        <div class="text-danger"><?php echo $icerikErr; ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>
           </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php" ?>
