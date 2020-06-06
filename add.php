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
        <span style="font-weight: 700; font-size: 36px">ADD NEW FIGHTER</span>
        <form method="post" action="src/actions/upload.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="addName">Name</label>
                <input type="text" class="form-control" name="addName">
            </div>
            <div class="form-group">
                <label for="addAge">Age</label>
                <input type="number" class="form-control" name="addAge">
            </div>
            <div class="form-group">
                <label for="addInfo">Cat info</label>
                <input type="text" class="form-control" name="addInfo">
            </div>
            <div class="form-group">
                <label for="addWins">Wins</label>
                <input type="number" class="form-control" name="addWins">
            </div>
            <div class="form-group">
                <label for="addLoss">Loss</label>
                <input type="number" class="form-control" name="addLoss">
            </div>
            <div class="form-group">
                <input type="file" name="fileToUpload">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 250px">Add</button>
        </form>
    </div>
</body>