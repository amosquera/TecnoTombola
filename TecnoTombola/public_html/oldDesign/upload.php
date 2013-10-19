<?php

session_start();
if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
} else {
    $_SESSION['par'] = utf8_encode("<p class='s'>" . str_replace("\n", "</p><p class='s'>", file_get_contents($_FILES['file']['tmp_name'])) . "</p>");
    header("Location: tombo.php");
    die();
}
?>