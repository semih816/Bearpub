<?php

function getCategories() {
    include "ayar.php";

    $query = "SELECT * from kategoriler";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getCategoryById(int $id) {
    include "ayar.php";
    
    $query = "SELECT * FROM kategoriler WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function editCategory(int $id, string $category) {
    include "ayar.php";

    $query = "UPDATE kategoriler SET kategori_adi='$category' WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function deleteCategory(int $id) {
    include 'ayar.php';

    $query = "DELETE FROM kategoriler WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function deleteMessage(int $id) {
    include 'ayar.php';

    $query = "DELETE FROM iletisim WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function deleteUser(int $id) {
    include 'ayar.php';

    $query = "DELETE FROM kullanicilar WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function loginUser(string $kullaniciAdi, string $sifre) {
    include "ayar.php";

    $query = "SELECT * FROM üye WHERE kullaniciAdi = ?";
    $stmt = mysqli_prepare($baglanti, $query);
    mysqli_stmt_bind_param($stmt, 's', $kullaniciAdi);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Kullanıcı bulundu, şifreyi kontrol et
        if (password_verify($sifre, $row['sifre'])) {
            mysqli_stmt_close($stmt);
            mysqli_close($baglanti);
            return $row; // Kullanıcı bilgilerini döndür
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($baglanti);
    return false; // Kullanıcı bulunamadı veya şifre uyuşmuyor
}
function isLoggedIn() {
    include 'ayar.php';
  return (isset($_SESSION['username']) && $_SESSION['username'] == true);
}
function isAdminLoggedIn() {
    include 'ayar.php';
  return (isset($_SESSION['kullaniciAdi']) && $_SESSION['kullaniciAdi'] == true);
}
function createCategory(string $kategori) {
    include "ayar.php";

    $query = "INSERT INTO kategoriler(kategori_adi) VALUES (?)";
    $stmt = mysqli_prepare($baglanti,$query);

    mysqli_stmt_bind_param($stmt, 's', $kategori);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($baglanti);

    return $stmt;
}
function createPost(string $baslik, string $altBaslik, string $icerik, int $onay=0) {
    include "ayar.php";

    $query = "INSERT INTO post(baslik,altBaslik,icerik,onay) VALUES (?,?,?,?)";
    $stmt = mysqli_prepare($baglanti,$query);

    mysqli_stmt_bind_param($stmt, 'sssi' ,$baslik,$altBaslik,$icerik,$onay);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($baglanti);

    return $stmt;
}
function createMessage(string $isim, string $mail, string $konuBaslik, string $konu, int $okundu=0) {
    include "ayar.php";

    $query = "INSERT INTO iletisim(isim,mail,konuBaslik,konu,okundu) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($baglanti,$query);

    mysqli_stmt_bind_param($stmt, 'ssssi' ,$isim,$mail,$konuBaslik,$konu,$okundu);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($baglanti);

    return $stmt;
}
function createUser(string $kullaniciAdi, string $mail, string $sifre) {
    include "ayar.php";

    $query = "INSERT INTO üye(kullaniciAdi,mail,sifre) VALUES (?,?,?)";
    $stmt = mysqli_prepare($baglanti,$query);

    mysqli_stmt_bind_param($stmt, 'sss' ,$kullaniciAdi,$mail,$sifre);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($baglanti);

    return $stmt;
}
function getPost() {
    include "ayar.php";

    $query = "SELECT * FROM post ORDER BY id DESC";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getUser() {
    include "ayar.php";

    $query = "SELECT * FROM kullanicilar ORDER BY id DESC";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getCategoriesByPostId(int $postId) {
    include "ayar.php";
    $query = "SELECT * FROM `post_kategori` inner join kategoriler on post_kategori.kategori_id = kategoriler.id WHERE post_kategori.post_id=$postId";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getPostById(int $id) {
    include "ayar.php";
    
    $query = "SELECT * from post WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getMessageByIdd(int $id) {
    include "ayar.php";
    
    $query = "SELECT * from iletisim WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function editPost(int $id, string $baslik, string $altBaslik,string $icerik,int $onay) {
    include "ayar.php";

    $query = "UPDATE post SET baslik='$baslik', altBaslik='$altBaslik',icerik='$icerik',onay=$onay WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function editMessage(int $id,int $okundu) {
    include "ayar.php";

    $query = "UPDATE iletisim SET okundu=$okundu WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function clearPostCategories(int $id, array $categories) {
    include 'ayar.php';

    $query = "DELETE FROM post_kategori WHERE post_id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function addPostCategories(int $id, array $categories) {
    include 'ayar.php';

    $query = "";

    foreach($categories as $catid) {
        $query .= "INSERT INTO post_kategori(post_id,kategori_id) VALUES($id,$catid);";
    }

    $sonuc = mysqli_multi_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function deletePost(int $id) {
    include 'ayar.php';

    $query = "DELETE FROM post WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function postCount() {
    include "ayar.php";
    
    $query = "SELECT * FROM post";
    $sonuc = mysqli_query($baglanti, $query);
    
    if (!$sonuc) {
        die("Sorgu hatası: " . mysqli_error($baglanti));
    }
    $post_count = mysqli_num_rows($sonuc);
    mysqli_free_result($sonuc);
    mysqli_close($baglanti);
    return $post_count;
}
function userCount() {
    include "ayar.php";
    
    $query = "SELECT * FROM kullanicilar";
    $sonuc = mysqli_query($baglanti, $query);
    
    if (!$sonuc) {
        die("Sorgu hatası: " . mysqli_error($baglanti));
    }
    $user_count = mysqli_num_rows($sonuc);
    mysqli_free_result($sonuc);
    mysqli_close($baglanti);
    return $user_count;
    
}
function categoryCount() {
    include "ayar.php";
    
    $query = "SELECT * FROM kategoriler";
    $sonuc = mysqli_query($baglanti, $query);
    
    if (!$sonuc) {
        die("Sorgu hatası: " . mysqli_error($baglanti));
    }
    
    $category_count = mysqli_num_rows($sonuc);
    
    mysqli_free_result($sonuc);
    mysqli_close($baglanti);
    
    return $category_count;
}
function getPostsByCategoryId(int $id) {
    include "ayar.php";
    
    $query = "SELECT * from post_kategori INNER JOIN post on post_kategori.post_id=post.id WHERE post_kategori.kategori_id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getMessageById(){
    include "ayar.php";
    
    $query = "SELECT * from iletisim ORDER BY id DESC";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}

function safe_html($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data ;
}
?>