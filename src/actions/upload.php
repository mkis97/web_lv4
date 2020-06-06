<?php
require_once '../../index.php';


echo "test";
$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
$image_base64 = base64_encode(file_get_contents($_FILES['fileToUpload']['tmp_name']));
$image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
$name = $_POST['addName'];
$age = $_POST['addAge'];
$catInfo = $_POST['addInfo'];
$catWins = $_POST['addWins'];
$catLoss = $_POST['addLoss'];
$db->Create($name, $age, $catInfo, $catWins, $catLoss, $image);
