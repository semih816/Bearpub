<?php 
    if(isset($_GET["categoryid"]) && is_numeric($_GET["categoryid"])){
        $secilenKategori = $_GET["categoryid"];
    }
?>
    <h1 class="mb-3 res-title ">
        Kateegoriler
    </h1>
    <div class="list-group">
        <?php $sonuc = getCategories(); while($category = mysqli_fetch_assoc($sonuc)): ?>
        <a 
        href="<?php echo "index.php?categoryid=".$category["id"] ?>" 
        class="list-group-item list-group-item-action bg-dark text-light
        
            <?php 
                if ($category["id"] == $secilenKategori) {
                    echo "active";
                }
            ?>
        
        ">
        <?php echo $category["kategori_adi"] ?></a>
        <?php endwhile; ?>
    </div>