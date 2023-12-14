<?php include 'inc/message.php'; ?>
<?php include 'inc/header.php'; ?>
<div id="wrapper">
<?php include 'inc/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

            <?php include 'inc/navbar.php'; ?>

<?php include "libs/function.php"; ?>



<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-2 text-gray-800">Gönderi Listesi</h1>
        </div>
        <div class="col-6" style="padding-left: 500px;">
            <a href="post-create.php" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Gönderi Ekle</span>
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="width:100px;">Id</th>
                    <th>Başlık</th>
                    <th style="width:250px;">Kategori Adı</th>
                    <th style="width:200px;">Gönderim Tarihi</th>
                    <th style="width:150px;">Onay Durumu</th>
                    <th style="width:150px;">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php $sonuc = getPost(); while($post = mysqli_fetch_assoc($sonuc)): ?>
                <tr>
                    <td><?php echo $post["id"] ?></td>
                    <td><?php echo $post["baslik"] ?></td>
                    <td>
                        <?php 
                        echo "<ul>";
                        $result=getCategoriesByPostId($post["id"]);
                        if(mysqli_num_rows($result) > 0){
                            while($category = mysqli_fetch_assoc($result)){
                                echo "<li>".$category["kategori_adi"]."</li>";
                            }
                        }else{
                           echo "<li>Kategori Seçilmedi</li>";
                        }
                        echo "</ul>";

                        ?>
                    </td>
                    <td><?php echo $post["yayınTarihi"] ?></td>

                    <td>
                        <?php if($post["onay"]): ?>
                            <i class="fas fa-check"></i>
                        <?php else: ?>
                            <i class="fas fa-times"></i>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="post-edit.php?id=<?php echo $post["id"] ?>" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-id="<?php echo $post["id"] ?>" class="btn btn-danger btn-circle btn-sm sil-gönderi">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>