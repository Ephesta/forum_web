<?php
require_once "forumhtml.php";
head_ustkisim();
kategori_bari();
icerik_sol();



$baglanti = new mysqli("localhost", "root", "", "forum");

$title = isset($_GET['title']) ? $_GET['title'] : '';

$sorgu = "SELECT title, content FROM yazilar WHERE title = ?";
$stmt = $baglanti->prepare($sorgu);

$stmt->bind_param("s", $title);
$stmt->execute();
$sonuc = $stmt->get_result();

if ($sonuc->num_rows > 0) {

    $makale = $sonuc->fetch_assoc();
} else {
    die("Makale bulunamadı.");
}


$stmt->close();
$baglanti->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($makale['title']); ?></title>
</head>
<body>
    <div class="title">
    <h1><?php echo htmlspecialchars($makale['title']); ?></h1></div>
    <div class="content">
    <p><?php echo nl2br(htmlspecialchars($makale['content'])); ?></p>
    </div>
    <style>
        .content {
            padding-left: 10px;
            float: left;
        }
        .title{
            margin-top: 10px;
        }
        </style>
</body>
</html>
<?php
profil();
?>
