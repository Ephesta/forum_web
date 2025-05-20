<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "forum";
$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}


if (!isset($_GET['id'])) {
    header("Location: admin_panel.php");
    exit;
}

$id = intval($_GET['id']);


$sql = "SELECT * FROM yazilar WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Makale bulunamadı!";
    exit;
}

$article = $result->fetch_assoc();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $updateSql = "UPDATE yazilar SET title = ?, content = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssi", $title, $content, $id);
    $updateStmt->execute();

    header("Location: admin_panel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makale Düzenle</title>
</head>
<body>
    <h1>Makale Düzenle</h1>
    <form method="POST">
        <label for="title">Başlık:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" required><br><br>

        <label for="content">İçerik:</label><br>
        <textarea id="content" name="content" rows="10" cols="50" required><?php echo htmlspecialchars($article['content']); ?></textarea><br><br>

        <button type="submit">Kaydet</button>
        <a href="admin_panel.php">İptal</a>
    </form>
</body>
</html>
