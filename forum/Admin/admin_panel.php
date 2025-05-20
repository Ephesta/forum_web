<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "forum";
$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM yazilar WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}


$sql = "SELECT * FROM yazilar";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makale Listesi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .delete-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .edit-btn {
            background-color: orange;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Makale Listesi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Başlık</th>
                <th>İçerik</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['content']); ?></td>
                        <td>
                            
                            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Bu makaleyi silmek istediğinizden emin misiniz?');">
                                <button class="delete-btn">Sil</button>
                            </a>
                            
                            <a href="edit.php?id=<?php echo $row['id']; ?>">
                                <button class="edit-btn">Düzenle</button>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Hiç makale bulunamadı.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
