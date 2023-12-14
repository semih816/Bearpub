<?php
    require "libs/function.php";
?>
<?php include 'inc/header.php';  
?>
<div id="wrapper">
<?php include 'inc/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

<?php session_start(); include 'inc/navbar.php'; ?>
<?php include "inc/header.php" ?>

<?php
    $categoryErr = $category = "";

    if($_SERVER["REQUEST_METHOD"]=="POST") {

        if(empty($_POST["category"])) {
            $categoryErr = "Kategori Boş Geçilemez.";
        } else {
            $category = safe_html($_POST["category"]);
        }
        if(empty($categoryErr)) {
            createCategory($category);
           $_SESSION["message"] = "Kategori Başarıyla Eklendi";
          $_SESSION["type"] = "success";
            echo "<script> window.location.href='admin-categories.php';</script>";
        }
    }
?>

<div class="container my-3">
    <div class="row">
    <div class="col-6">
        <h1 class="h3 mb-2 text-gray-800">Kategori Ekle</h1>
    </div>
        <div class="col-12">
            <div class="card card-body">
                <form action="category-create.php" method="post">
                    <div class="mb-3">
                        <label for="category">Kategori Adı :</label>
                        <input type="text" name="category" class="form-control" value="<?php echo $category;?>">
                        <h5 class="text-danger mt-3"><?php echo $categoryErr; ?></h5>
                        <p class="text-danger">Kategori 20 Karakter İle Sınırlıdır</p>
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>
           </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php" ?>
