
<?php include 'inc/message.php'; ?>
<?php include 'inc/header.php'; ?>
<div id="wrapper">
<?php include 'inc/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

            <?php include 'inc/navbar.php'; ?>

<?php include "libs/function.php"; ?>

    <div class="container-fluid">
    <?php 
        if (isset($_SESSION["kullaniciAdi"])): 
    ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hoşgeldiniz</h1>
        </div>
      <?php  $sonuc = postCount(); $post_count = $sonuc; ?>
      <?php  $sonuc = userCount(); $user_count = $sonuc; ?>
        <div class="row">
                <!-- Üyeler -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Üyeler </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user_count; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Gönderi Sayısı -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Toplam Gönderi Sayısı </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $post_count; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php  $sonuc = categoryCount(); $category_count = $sonuc; ?>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Toplam Kategori Sayısı</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $category_count; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else:
            echo "<script>window.location.href='login.php';</script>";
        ?>
          <?php endif;?>
    </div>
    </div>
<?php include 'inc/footer.php'; ?>
