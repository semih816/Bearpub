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
            <h1 class="h3 mb-2 text-gray-800">Kategori Listesi</h1>
        </div>
        <div class="col-6" style="padding-left: 500px;">
            <a href="category-create.php" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Kategori Ekle</span>
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="width:100px;">Id</th>
                    <th>Kategori Adı</th>
                    <th>Kategori Eklenme Tarihi</th>
                    <th style="width:150px;">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php $sonuc = getCategories(); while($category = mysqli_fetch_assoc($sonuc)): ?>
                <tr>
                    <td><?php echo $category["id"] ?></td>
                    <td><?php echo $category["kategori_adi"] ?></td>
                    <td><?php echo $category["kategoriTarih"] ?></td>
                    <td>
                        <a href="category-edit.php?id=<?php echo $category["id"] ?>" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-id="<?php echo $category["id"] ?>" class="btn btn-danger btn-circle btn-sm sil-kategori">
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