 <?php 
session_start();
if (isset($_SESSION["username"])){
    echo "<script>window.location.href='index.php';</script>";

}else{
    echo "<script>window.location.href='index.php';</script>";

}
?>