<?php
require_once("../baseball/db_connect.php");

$sql = "SELECT * FROM teacher WHERE valid=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!doctype html>
<html lang="en">

<head>
    <title>教練列表Coach</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include("../baseball/assets/css/ws_css.php") ?>
</head>

<body>
    <div class="container">
        <div class="row g-3">
            <div class="col-md-6">
                <img class="img-fluid" src="../baseball/assets/img/teacher_img/<?= $row["photo"] ?>" alt="<?= $row["name"] ?>">
            </div>
            <div class="col-md-6 border">
                <h1><?= $row["name"] ?></h1>
                <div class="border"><?= $row["description"] ?></div>
            </div>
        </div>
    </div>

    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>