<?php 
    include "libs/function.php";

    $id = $_GET["id"];
    
    if (deleteMessage($id)){
        session_start();
        $_SESSION["message"] = "Mesaj Başarıyla Silinmiştir";
        $_SESSION["type"] = "danger";
        echo "<script> window.location.href='admin-message.php';</script>";
    }else{
        echo "Hata";
    }
?>