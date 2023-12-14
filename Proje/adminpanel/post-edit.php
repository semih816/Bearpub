<?php require_once('inc/header.php') ?>
<div id="wrapper">
<?php require_once('inc/sidebar.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            <?php session_start(); include 'inc/navbar.php'; ?>
<?php include "libs/function.php" ?>

<?php
   $id = $_GET["id"];
   $sonuc = getPostById($id);
   $selectedPost = mysqli_fetch_assoc($sonuc);

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
    $onay = $_POST["onay"] == "on"?1:0;

    $categories = [];

    if (isset($_POST["categories"])) {
        $categories = $_POST["categories"];
    }

        if(empty($baslikErr)&& empty($altBaslikErr)&& empty($icerikErr)) {
        if (editPost($id,$baslik,$altBaslik,$icerik,$onay)) {
            clearPostCategories($id,$categories);
            if (count($categories)>0) {
                addPostCategories($id,$categories);
            }
            $_SESSION["message"] = "Gönderi Başarıyla Güncellendi";
            $_SESSION["type"] = "warning";
            echo "<script> window.location.href='admin-post.php';</script>";
        }else{
            echo "hata";
        }
           
        }
    }
?>

<div class="container my-3">
<div class="col-6">
    <h1 class="h3 mb-2 text-gray-800">Gönderi Güncelle</h1> 
</div>
<div class="card card-body">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-9">
                
                    <div class="mb-3">
                        <label for="baslik">Başlık</label>
                        <input type="text" name="baslik" class="form-control" value="<?php echo $selectedPost["baslik"];?>">
                        <div class="text-danger"><?php echo $baslikErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="altBaslik">Alt Başlık</label>
                        <input type="text" name="altBaslik" class="form-control" value="<?php echo $selectedPost["altBaslik"];?>">
                        <div class="text-danger"><?php echo $altBaslikErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="icerik">İçerik</label>
                        <textarea name="icerik" class="form-control"><?php echo $selectedPost["icerik"];?></textarea>
                        <div class="text-danger"><?php echo $icerikErr; ?></div>
                    </div>          
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                
            </div>
            <div class="col-3">
                <img src="../images/Folder.png" class="img-fluid" alt="">
                <hr>
                <?php foreach(getCategories() as $c): ?>
                    <div class="form-check">
                        <label for="category_<?php echo $c["id"]?>"><?php echo $c["kategori_adi"]?></label>
                        <input type="checkbox" name="categories[]" value="<?php echo $c["id"]?>" id="category_<?php echo $c["id"]?>" class="form-check-input ml-2" 
                        
                            <?php
                                $isChecked = false;
                                $selectedCategories = getCategoriesByPostId($selectedPost["id"]);

                                foreach ($selectedCategories as $selectedCat) {
                                    if($selectedCat["id"] == $c["id"]) {
                                        $isChecked = true;
                                    }
                                }

                                if($isChecked) {
                                    echo "checked";
                                }                           
                            ?>
                        >
                    </div>
                <?php endforeach; ?>
                <hr>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="onay" name="onay" 
                        <?php echo $selectedPost["onay"]?"checked":""?>>
                    <label class="form-check-label" for="onay">
                        Onay
                    </label>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<?php include "inc/footer.php" ?>