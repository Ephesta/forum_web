<?php
require_once "../VeriTabanı/baglan.php";
$baglanti = baglan();

$kullanici_adi = "admin";
$sifre = "123123"; 
$hashed_sifre = password_hash($sifre, PASSWORD_DEFAULT); 

$query = "INSERT INTO admins (username, password ) VALUES (?, ?)";
$stmt = $baglanti->prepare($query);
$stmt->bind_param("ss", $kullanici_adi, $hashed_sifre);

if ($stmt->execute()) {
    echo "Admin başarıyla eklendi!";
} else {
    echo "Hata oluştu: " . $stmt->error;
}

$stmt->close();
$baglanti->close();
?>