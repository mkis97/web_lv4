<?php
$id = $_GET['id'];
echo $id;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadatak 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
</head>

<body>
    <div class=container>
        <span style="font-weight: 700; font-size: 36px">UPDATE FIGHTER</span>
        <form method="POST" action="src/actions/update.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="updateName">Name</label>
                <input type="text" class="form-control" name="updateName">
            </div>
            <div class="form-group">
                <label for="updateAge">Age</label>
                <input type="number" class="form-control" name="updateAge">
            </div>
            <div class="form-group">
                <label for="updateInfo">Cat info</label>
                <input type="text" class="form-control" name="updateInfo">
            </div>
            <div class="form-group">
                <label for="updateWins">Wins</label>
                <input type="number" class="form-control" name="updateWins">
            </div>
            <div class="form-group">
                <label for="updateLoss">Loss</label>
                <input type="number" class="form-control" name="updateLoss">
            </div>
            <div class="form-group">
                <input type="file" name=fileToUpload>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 250px">Update</button>
        </form>
        <div class="mt-5" style="text-align:right">
            <button type="button" class="btn btn-danger" style="width: 250px">Delete</button>
        </div>
    </div>
</body>