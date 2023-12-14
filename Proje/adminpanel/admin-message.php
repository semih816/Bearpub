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
            <h1 class="h3 mb-2 text-gray-800">Mesaj Listesi</h1>
        </div>
        <div class="col-6" style="padding-left: 500px;">
            <a href="message-list.php" style="width:200px;" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Okunmuş Mesajlar</span>
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="width:10px;">Id</th>
                    <th style="width:200px;">İsim</th>
                    <th style="width:250px;">Mail</th>
                    <th style="width:250px;">Konu Başlık</th>
                    <th style="width:250px;">Gönderim Tarihi</th>
                    <th style="width:50px;">Okundu</th>
                    <th style="width:150px;">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php $sonuc = getMessageById(); while($message = mysqli_fetch_assoc($sonuc)): if(!$message["okundu"]):  ?>
                <tr>
                    <td><?php echo $message["id"] ?></td>
                    <td><?php echo $message["isim"] ?></td>
                    <td><?php echo $message["mail"] ?></td>
                    <td><?php echo $message["konuBaslik"] ?></td>
                    <td><?php echo $message["mesajTarih"] ?></td>
                    <td>    
                            <i class="fas fa-times"></i>

                        <?php ; ?>
                    </td>
                    <td>
                        <a href="message-edit.php?id=<?php echo $message["id"] ?>" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-id="<?php echo $message["id"] ?>" class="btn btn-danger btn-circle btn-sm sil-mesaj">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endif; endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>