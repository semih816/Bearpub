<?php require_once('inc/header.php') ?>
<div id="wrapper">
<?php require_once('inc/sidebar.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            <?php session_start(); include 'inc/navbar.php'; ?>
<?php include "libs/function.php" ?>

<?php

   $id = $_GET["id"];
   $sonuc = getMessageByIdd($id);
   $selectedMessage = mysqli_fetch_assoc($sonuc);
   
   if($_SERVER["REQUEST_METHOD"]=="POST") {

    $okundu = isset($_POST["onay"]) ? 1 : 0;

    if (editMessage($id, $okundu)) {
        $_SESSION["message"] = "Mesaj Okundu";
        $_SESSION["type"] = "warning";
        echo "<script> window.location.href='admin-message.php';</script>";
    } else {
        echo "hata";
    }
    }
?>

<div class="container my-3">
<div class="col-6">
    <h1 class="h3 mb-2 text-gray-800">Mesajı Görüntüle</h1> 
</div>
<div class="card card-body">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="isim">İsim</label>
                    <input type="text" name="isim" class="form-control" value="<?php echo $selectedMessage["isim"];?>">
                </div>
                <div class="mb-3">
                    <label for="mail">Mail</label>
                    <input type="mail" name="mail" class="form-control" value="<?php echo $selectedMessage["mail"];?>">
                </div>
                <div class="mb-3">
                    <label for="konuBaslik">Konu Başlığı</label>
                    <input type="text" name="konuBaslik" class="form-control" value="<?php echo $selectedMessage["konuBaslik"];?>">
                </div>
                <div class="mb-3">
                    <label for="konu">Konusu</label>
                    <textarea name="konu" class="form-control"><?php echo $selectedMessage["konu"];?></textarea>
                </div>          
                <div class="col-4">
                    <div class="form-check mb-3 mt-2">
                        <input class="form-check-input" type="checkbox"  id="onay" name="onay" <?php echo $selectedMessage["okundu"] ? "checked" : ""?>>
                        <label class="form-check-label" for="onay">Okundu</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Güncelle</button>
            </div>
        </div>
    </form>
</div>
</div>
<?php include "inc/footer.php" ?>