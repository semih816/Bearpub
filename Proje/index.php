 <?php require_once('inc/_header.php') ?>
   <!-------------------------------------------------------------START NAVBAR------------------------------------------------------>

<?php require_once('inc/_navbar.php') ?>
<?php include "../Proje/adminpanel/libs/function.php"; ?>
    <!-------------------------------------------------------------END NAVBAR------------------------------------------------------>
    <!------------------------------------------------------------Start Project---------------------------------------------------->

    <div class="container my-3 ">
        <div class="row">
            <div class="col-3">
               <?php include 'inc/_kategoriler.php'; ?>
            </div>
            <div class="res-hide"></div>

            <div class="col-9">
             
            <?php include 'inc/_gonderiler.php'; ?>

            </div>
        </div>
    </div>

    <!-------------------------------------------------------------End Project------------------------------------------------------>

    <!-------------------------------------------------------------START FOOTER------------------------------------------------------>

    <?php require_once('inc/_footer.php') ?>