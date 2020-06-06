<?php

require 'src/connection_db.php';


$db = new Database();



/* Execute the connect function in the $db class */
$db->Connect();


/* Execute the create function */
//$db->Create("INSERT INTO feedback (name, message, email) VALUES ('John Doe', 'test@test.com', 'test@gmail.com')");
// $ExampleQueryInsert = "INSERT INTO feedback (name, message, email) VALUES ('John Doe', 'test@test.com', 'test@gmail.com')";

/* Execute the read function */
$db->Read("SELECT * FROM cats_M");


function showCats($catsArr)
{
    foreach ($catsArr as $cat) {
?>
        <div class="col-md-4 mb-1">
            <div class="fighter-box" data-info='{
                                "id": <?php echo $cat['id'] ?>,
                                "name": "<?php echo $cat['name'] ?>" ,
                                "age" : <?php echo $cat['age'] ?>,
                                "catInfo": "<?php echo $cat['info'] ?>",
                                "record" : {
                                    "wins":  <?php echo $cat['wins'] ?>,
                                    "loss": <?php echo $cat['loss'] ?>
                                }
                            }'>
                <img src="<?php echo $cat['img'] ?>" alt="<?php echo $cat['img'] ?>" width="150" height="150">

                <a href="update.php?id=<?php echo $cat['id'] ?>" class="btn btn-sm btn-light edit-btn cat-form">Edit</a>
                <a href="src/actions/delete.php?id=<?php echo $cat['id'] ?>" class="btn btn-sm btn-danger delete-btn cat-form">Delete</a>
            </div>
        </div>
<?php
    }
}

$db->createTable();

$arrC=[];

$arrC=$db->Read();

/* Execute the update function */
//$db->Update("UPDATE feedback SET name='Michel Z' WHERE id=1");
//$ExampleQueryUpdate = "UPDATE cats_m SET name='Michel Z' WHERE id=1";

/* Execute the delete function */
//$db->Delete(2);
//$ExampleQueryDelete = 2;

/* Open the close function */
//$db->CloseConnection();
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
    <section class="container d-flex flex-column  align-items-center mb-4">
        <h1>CFC 3</h1>
        <h2>Choose your cat</h2>
    </section>
    <div class="container d-flex flex-column  align-items-center">
        <div id="clock" class="clock display-4"></div>
        <div id="message" class="message"></div>
    </div>
    <div class="row">
        <div id="firstSide" class="container d-flex flex-column  align-items-center side first-side col-5">
            <div class="row d-flex justify-content-end">
                <div class="col-auto">
                    <ul class="cat-info list-group">
                        <li class="list-group-item name">Cat Name</li>
                        <li class="list-group-item age">Cat age</li>
                        <li class="list-group-item skills">Cat Info</li>
                        <li class="list-group-item record">Wins:<span class="wins"></span> Loss: <span class="loss"></span></li>
                    </ul>
                </div>
                <div class="col-auto featured-cat-fighter">
                    <img class="featured-cat-fighter-image img-rounded" src="https://via.placeholder.com/300" alt="Featured cat fighter">
                </div>
                <div class="col-auto w-100" style="margin-top: 24px">
                    <div class="row fighter-list" id="leftCats">
                        <?php 
                        showCats($arrC) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 d-flex flex-column align-items-center">
            <p class="display-4">VS</p>
            <button id="generateFight" class="btn btn-primary mb-4 btn-lg">Fight</button>
            <button id="randomFight" class="btn btn-secondary">Select Random fighters</button>
        </div>
        <div id="secondSide" class="container d-flex flex-column align-items-center side second-side col-5">
            <div class="row">
                <div class="col-auto featured-cat-fighter">
                    <img class="featured-cat-fighter-image img-rounded" src="https://via.placeholder.com/300" alt="Featured cat fighter">
                </div>
                <div class="col-auto">
                    <ul class="cat-info list-group">
                        <li class="list-group-item name">Cat Name</li>
                        <li class="list-group-item age">Cat age</li>
                        <li class="list-group-item skills">Cat Info</li>
                        <li class="list-group-item record">Wins: <span class="wins"></span>Loss: <span class="loss"></span></li>
                    </ul>
                </div>
                <div class="col-auto w-100" style="margin-top: 24px">
                    <div class="row fighter-list" id="rightCats">
                        <?php showCats($arrC) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex flex-column  align-items-center mt-5">
            <a href="add.php">
                <button class="btn btn-info mb-4 btn-lg white-text">Add new fighter</button>
            </a>
        </div>
    </div>
    <script src="./src/app.js"></script>
</body>

</html>

