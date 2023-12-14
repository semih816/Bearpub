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
            <h1 class="h3 mb-2 text-gray-800">Üye Listesi</h1>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="width:10px;">Id</th>
                    <th style="width:250px;">İsim</th>
                    <th style="width:250px;">Mail</th>
                    <th style="width:250px;">Şifre</th>
                    <th style="width:150px;">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php $sonuc = getUser(); while($üye = mysqli_fetch_assoc($sonuc)):   ?>
                <tr>
                    <td><?php echo $üye["id"] ?></td>
                    <td><?php echo $üye["username"] ?></td>
                    <td><?php echo $üye["email"] ?></td>
                    <td><?php echo $üye["password"] ?></td>
                    <td>
                        <a href="#" data-id="<?php echo $üye["id"] ?>" class="btn btn-danger btn-circle btn-sm sil-üye">
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