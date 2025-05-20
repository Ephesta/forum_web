<?php
require_once "forumhtml.php";
head_ustkisim();
kategori_bari();
icerik_sol();
gonderi();

?>
<?php

$baglanti = new mysqli("localhost", "root", "", "forum");


if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $baglanti->real_escape_string($_POST['title']); 
    $content = $baglanti->real_escape_string($_POST['content']); 


    $sql = "INSERT INTO yazilar (title, content) VALUES ('$title', '$content')";

    if ($baglanti->query($sql) === TRUE) {

        echo "Makale başarıyla eklendi!";

    } 
}


$baglanti->close();
profil();
?>
