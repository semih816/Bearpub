<?php 
    include "libs/function.php";

    $id = $_GET["id"];
    
    if (deleteCategory($id)){
        session_start();
        $_SESSION["message"] = "Kategori Başarıyla Silinmiştir";
        $_SESSION["type"] = "danger";
        echo "<script> window.location.href='admin-categories.php';</script>";
    }else{
        echo "Hata";
    }
?>