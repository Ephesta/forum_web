<?php
session_start();
require 'baglan.php';

if(isset($_POST["kayit"])) {
    $username = $_POST['kullanici_adi'];
    $password = $_POST['parola'];

    switch(true) {
        case empty($username):
            echo "Kullanıcı adı boş bırakılamaz";
            break;
        case empty($password):
            echo "Şifre boş bırakılamaz";
            break;
        default:
            $baglanti = baglan();
            $sorgu = $baglanti->prepare("INSERT INTO kullanicilar (kullanici_adi, parola) VALUES (?, ?)");
            $sorgu->bind_param("ss", $username, $password);
            
            if($sorgu->execute()) {
                echo "Kayıt Başarılı";
                header("Location: ../Tasarım/main_index.php");
            } else {
                echo "Kayıt Başarısız: " . $sorgu->error;
            }
            $sorgu->close();
            $baglanti->close();
            break;
    }
}
if(isset($_POST["giris"])) {
    $username = $_POST['kullanici_adi'];
    $password = $_POST['parola'];

    $baglanti = baglan();
    $sorgu = $baglanti->prepare("SELECT * FROM kullanicilar WHERE kullanici_adi = ? AND parola = ?");
    $sorgu->bind_param("ss", $username, $password);
    $sorgu->execute();
    $result = $sorgu->get_result();

    if($result->num_rows > 0) {
        $_SESSION['kullanici_adi'] = $username;
        header("Location: ../Tasarım/main_index.php");
        exit();
    } else {
        header("Location: kayit.php?hata=1");
        exit();
    }
    $sorgu->close();
    $baglanti->close();
}
?>