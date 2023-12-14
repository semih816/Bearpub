<?php
session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navBar-Poz">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img class="navBar-İmg" src="images/Logo.png" width="80px" height="60px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">İletişim</a>
                    </li>
                </ul>
                    <!-- Eğer Oturum Yoksa Gösterilsin -->
               
                    <!-- Eğer Oturum Varsa Gösterilsin -->
                    <?php 
                        if (isset($_SESSION["username"])): 
                    ?>
                     <form action="profile.php" class="d-flex" role="search">
                    
                        <button class="form-control me-2 btn btn-outline-success navBar-Buttons" type="submit"> <p class="text-white" style="display: inline-block;">Hoşgeliniz,</p><strong> <?php echo $_SESSION["username"];?></strong></button>
                    </form> 
                    <?php else: ?>
                        <form action="register.php" class="d-flex" role="search">
                        <button class="form-control me-2 btn btn-secondary navBar-Buttons" type="submit">Kayıt</button>
                    </form>
                    <form action="login.php" class="d-flex" role="search">
                        <button class="form-control me-2 btn btn-success navBar-Buttons" type="submit">Giriş</button>
                    </form>
                    <?php endif; ?>


            </div>
        </div>
    </nav>