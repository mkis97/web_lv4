<?php
require_once '../../index.php';
require_once '../../update.php';

$id = $_GET['id'];
echo $id;

$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
$image_base64 = base64_encode(file_get_contents($_FILES['fileToUpload']['tmp_name']));
$image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
$name = $_POST['updateName'];
$age = $_POST['updateAge'];
$catInfo = $_POST['updateInfo'];
$catWins = $_POST['updateWins'];
$catLoss = $_POST['updateLoss'];
$db->Update($id,$name, $age, $catInfo, $catWins, $catLoss, $image);
