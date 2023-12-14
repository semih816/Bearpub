<?php require_once('inc/_header.php') ?>
<div id="wrapper">
<?php require_once('inc/_navbar.php') ?>
<?php include "../Proje/adminpanel/libs/function.php"; ?>

<?php
    $isimErr = $isim = "";
    $mailErr = $mail = "";
    $konuBaslikErr = $konuBaslik = "";
    $konuErr = $konu = "";


    if($_SERVER["REQUEST_METHOD"]=="POST") {

        if(empty($_POST["isim"])) {
            $isimErr = "isim Boş Geçilemez.";
        } else {
            $isim = safe_html($_POST["isim"]);
        }
        if(empty($_POST["mail"])) {
            $mailErr = "Mail Boş Geçilemez.";
        } else {
            $mail = safe_html($_POST["mail"]);
        }
        if(empty($_POST["konuBaslik"])) {
            $konuBaslikErr = "Konu Başlık Boş Geçilemez.";
        } else {
            $konuBaslik = safe_html($_POST["konuBaslik"]);
        }
        if(empty($_POST["konu"])) {
            $konuErr = "Mesaj Geçilemez.";
        } else {
            $konu = safe_html($_POST["konu"]);
        }
        if(empty($isimErr) && empty($mailErr) && empty($konuBaslikErr) && empty($konuErr)) {
            createMessage($isim, $mail, $konuBaslik,$konu);
            $_SESSION["message"] = "Mesaj Başarıyla Eklendi";
            $_SESSION["type"] = "success";
            echo "<script> window.location.href='index.php';</script>";
        }
    }
?>
	<div class="contact1 mt-5">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-01.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" method="POST">
				<span class="contact1-form-title">
					İletişime Geç
				</span>

				<div class="wrap-input1 validate-input" data-validate = "İsim Zorunlu Alan">
					<input class="input1" type="text" name="isim" placeholder="İsim" value="<?php echo $isim;?>">
                    <div class="text-danger"><?php echo $isimErr; ?></div>
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Mail Zorunlu Alan: ex@abc.xyz">
					<input class="input1" type="text" name="mail" placeholder="Email" value="<?php echo $mail;?>">
                    <div class="text-danger"><?php echo $mailErr; ?></div>
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Konu Zorunlu Alan">
					<input class="input1" type="text" name="konuBaslik" placeholder="Konu" value="<?php echo $konuBaslik;?>">
                    <div class="text-danger"><?php echo $konuBaslikErr; ?></div>
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Mesaj Zorunlu Alan">
					<textarea class="input1" name="konu" placeholder="Mesajıınız" value="<?php echo $konu;?>"></textarea>
                    <div class="text-danger"><?php echo $konuErr; ?></div>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn">
						<span>
							Gönder
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

    <?php require_once('inc/_footer.php') ?>

</body>
</html>
