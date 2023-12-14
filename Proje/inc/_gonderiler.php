
<?php 
    if(isset($_GET["categoryid"]) && is_numeric($_GET["categoryid"])){
        $secilenKategori = $_GET["categoryid"];
        $sonuc = getPostsByCategoryId($secilenKategori);
    }else{
        $sonuc = getPost(); 
    }
?>
<h1 class="mb-3 res-title">
    Gönderiler
</h1>
<?php  if (mysqli_num_rows($sonuc) >0):  ?>
    <?php  while($post = mysqli_fetch_array($sonuc)): ?>
    <?php  if ($post["onay"]):  ?>
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
    <?php else:echo'<div class="alert alert-danger">Henüz Gönderi Eklenmemiştir</div>'; endif ?>
    <?php endwhile?>
<?php endif?>