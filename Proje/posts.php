 <?php require_once('inc/_header.php') ?>
   <!-------------------------------------------------------------START NAVBAR------------------------------------------------------>

<?php require_once('inc/_navbar.php') ?>
<?php include "../Proje/adminpanel/libs/function.php"; ?>
    <!-------------------------------------------------------------END NAVBAR------------------------------------------------------>
    <!------------------------------------------------------------Start Project---------------------------------------------------->
    <?php 
        if(isset($_GET["categoryid"]) && is_numeric($_GET["categoryid"])){
            $secilenKategori = $_GET["categoryid"];
        }
    ?>
       <?php 
            if(isset($_GET["categoryid"]) && is_numeric($_GET["categoryid"])){
                $secilenKategori = $_GET["categoryid"];
                $sonuc = getPostsByCategoryId($secilenKategori);
            }else{
                $sonuc = getPost(); 
            }
        ?>
    <div class="container my-3 ">
        <div class="row">
            <div class="col-3">
            <?php require_once('inc/_kategoriler.php') ?>
            </div>
            <div class="res-hide"></div>
            <div class="col-9">
            <?php require_once('inc/_gonderiler.php') ?>

                <h1 class="mb-3 res-title">
                    Gönderilen Dosyalar
                </h1>
                <?php  if (mysqli_num_rows($sonuc)>0){  ?>

                 <?php $sonuc = getPost(); while($post = mysqli_fetch_assoc($sonuc)):?>
                    <?php   if ($post["onay"]): ?>
                    <div class="card mb-3 bg-dark">
                        <div class="row">
                            <div class="col-2">
                                <img src="images/Folder.png" class="rounded-start post-image">
                            </div>
                            <div class="col-10">
                                <div class="card-body deneme" >
                                    <h5 class="card-title res-post-title "><?php echo $post["baslik"] ?></h5>
                                    <p class="card-text res-post-content "><?php echo $post["altBaslik"] ?></p>
                                    <p>
                                        <span class="badge rounded-pill text-bg-warning res-badge">Gönderilen Tarih : <?php echo $post["yayınTarihi"] ?></span>
                                    </p>
                                    <div class="text-end">
                                        <a href="post-detail.php?id=<?php echo $post["id"] ?>" class="btn btn-primary mx-2 res-btn ">Daha Fazla</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                   
            <?php endwhile; ?>

            </div>
            <?php }else{
                echo'<div class="alert alert-warning">Gönderi Yoktur</div>';
            } ?>
        </div>
        
    </div>


    <!-------------------------------------------------------------End Project------------------------------------------------------>

    <!-------------------------------------------------------------START FOOTER------------------------------------------------------>

    <?php require_once('inc/_footer.php') ?>