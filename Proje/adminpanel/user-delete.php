<?php 
    include "libs/function.php";

    $id = $_GET["id"];
    
    if (deleteUser($id)){
        session_start();
        $_SESSION["message"] = $category."Üye Başarıyla Silinmiştir";
        $_SESSION["type"] = "danger";
        echo "<script> window.location.href='users.php';</script>";
    }else{
        echo "Hata";
    }
?>