<?php
if (!isset($_GET["id"])) {
    $id = 0;
} else {
    $id = $_GET["id"];
}

$id = $_GET["id"];
require_once("../baseball/db_connect.php");

$sql = "SELECT * FROM teacher WHERE id=$id AND valid=1";
$result = $conn->query($sql);


$rowCount=$result->num_rows;


if ($rowCount != 0) {
    $row = $result->fetch_assoc();
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>教練Coach</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include("../baseball/assets/css/ws_css.php") ?>
</head>

<body>
    <div class="container">
    <?php if ($rowCount == 0) : ?>
            使用者不存在
        <?php else :
        ?>
        <div class="row g-3">
            <div class="col-md-6">
                <img class="img-fluid" src="../baseball/assets/img/teacher_img/<?= $row["photo"] ?>" alt="<?= $row["name"] ?>">
            </div>
            <div class="col-md-6 border">
                <h1><?= $row["name"] ?></h1>
                <tr>
                    <th>介紹</th>
                    <td><div class="border"><?= $row["description"] ?></div></td>
                </tr>
                
                <div class="py-2">
            <a class="btn btn-primary" href="teacher_list.php" role="button">
                <i class="fa-solid fa-arrow-left"></i>返回教練列表
            </a>
        </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>