<?php
session_start();
session_destroy();
header("Location: ../Tasarım/main_index.php");
exit();
?>