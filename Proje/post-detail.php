<?php require_once('inc/_header.php') ?>
<div id="wrapper">
<?php require_once('inc/_navbar.php') ?>
<?php include "../Proje/adminpanel/libs/function.php"; ?>


<div class="container my-3">
    <div class="card card-body bg-dark">
        <div class="row">
            <div class="col-9">
            <?php  $id = $_GET["id"]; $sonuc = getPostById($id); $post = mysqli_fetch_assoc($sonuc) ?>

                <form method="post">
                <fieldset disabled>
                <div class="mb-3">
                    <label for="baslik" class="mb-2">Başlık</label>
                    <p><?php echo $post["baslik"];?></p>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="altBaslik">Alt Başlık</label>
                    <p><?php echo $post["altBaslik"];?></p>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="icerik">İçerik</label>
                    <textarea name="icerik" id="disabledTextInput" class="form-control" readonly><?php echo $post["icerik"]; ?></textarea>
                </div>
                <fieldset>
                </form>

            </div>
            <div class="col-3">
                <img src="images/Folder.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<?php require_once('inc/_footer.php') ?>
