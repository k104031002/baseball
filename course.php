<?php
if (!isset($_GET["id"])) {
    $id = 0;
} else {
    $id = $_GET["id"];
}

$id = $_GET["id"];

require_once("../baseball/db_connect.php");

$sql = "SELECT * FROM course WHERE id=$id AND valid=1";
$result = $conn->query($sql);


$rowCount = $result->num_rows;


if ($rowCount != 0) {
    $row = $result->fetch_assoc();
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>課程Course</title>
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
                    <img class="img-fluid" src="../baseball/assets/img/course_img/<?= $row["photo"] ?>" alt="<?= $row["name"] ?>">
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <?= $row["type"] ?>
                    </div>
                    <h1><?= $row["name"] ?></h1>
                    <div class="py-2">
                    </div>
                    <div class="text-danger text-end h4">$ <?= number_format($row["price"]) ?></div>
                    <div><?= $row["description"] ?></div>
                    <div>
                        <h2>配合教練</h2>
                        <p><?= $row["teacher_id"] ?></p>
                    </div>
                    <div>
                        <h2>開課時間</h2><?= $row["course_start"] ?><br>~<br><?= $row["course_end"] ?>
                    </div>
                    <div class="py-2 d-flex justify-content-between">
                        <a class="btn btn-primary" href="course_list.php" role="button">
                            <i class="fa-solid fa-arrow-left"></i>返回課程列表
                        </a>
                        <a class="btn btn-primary" name="" id="" role="button" href="edit_course.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-pen"></i></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>