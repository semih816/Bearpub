<?php 
    include "libs/function.php";

    $id = $_GET["id"];
    
    if (deletePost($id)){
        session_start();
        $_SESSION["message"] = "Gönderi Başarıyla Silinmiştir";
        $_SESSION["type"] = "danger";
        echo "<script> window.location.href='admin-post.php';</script>";
    }else{
        echo "Hata";
    }
?>