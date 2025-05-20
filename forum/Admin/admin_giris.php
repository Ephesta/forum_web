<?php
session_start();
require_once "../VeriTabanı/baglan.php"; 

$baglanti = baglan();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kullanici_adi = $_POST['username'];
    $sifre = $_POST['password'];

    $query = "SELECT * FROM admins WHERE username = ?";
    $stmt = $baglanti->prepare($query);
    $stmt->bind_param("s", $kullanici_adi);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        if (password_verify($sifre, $admin['password'])) {
            $_SESSION['admin'] = $admin['username'];
            header("Location: admin_panel.php"); 
            exit;
        } else {
            $hata = "Şifre yanlış!";
        }
    } else {
        $hata = "Kullanıcı bulunamadı!";
    }
    if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != 1) {
        header("Location: admin_giris.html");
        exit();
    }

    $stmt->close();
    $baglanti->close();

}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Giriş</title>
</head>
<body>
    <h2>Admin Giriş</h2>
    <?php if (isset($hata)) echo "<p style='color:red;'>$hata</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Kullanıcı Adı" required><br>
        <input type="password" name="password" placeholder="Şifre" required><br>
        <button type="submit">Giriş Yap</button>
    </form>
</body>
</html>
