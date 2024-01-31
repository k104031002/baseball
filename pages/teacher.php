<?php
if (!isset($_GET["id"])) {
    $id = 0;
} else {
    $id = $_GET["id"];
}

$id = $_GET["id"];
require_once("./db_connect.php");

$sql = "SELECT * FROM teacher WHERE id=$id AND valid=1";
$result = $conn->query($sql);


$rowCount = $result->num_rows;


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
    <?php include("../assets/css/ws_css.php") ?>
</head>

<body>
    <div class="container">
        <?php if ($rowCount == 0) : ?>
            使用者不存在
        <?php else :
        ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <img class="img-fluid" src="../assets/img/teacher_img/<?= $row["photo"] ?>" alt="<?= $row["name"] ?>">
                </div>
                <div class="col-md-6 border">
                    <h1><?= $row["name"] ?></h1>
                    <tr>
                        <th>介紹</th>
                        <td>
                            <div class="border"><?= $row["description"] ?></div>
                        </td>
                    </tr>

                    <div class="py-2 d-flex justify-content-between">
                        <a class="btn btn-primary" href="teacher_list.php" role="button">
                            <i class="fa-solid fa-arrow-left"></i>返回教練列表
                        </a>
                        <a class="btn btn-primary" name="" id="" role="button" href="edit_teacher.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-pen"></i></a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confrimModal"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <!-- 彈窗 -->
            <div class="modal fade" id="confrimModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">刪除教練</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            確認刪除?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                            <a role="button" class="btn btn-danger" href="doDeleteTeacher.php?id=<?= $row["id"] ?>">確潤</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 彈窗結束 -->
        <?php endif; ?>
    </div>

    <?php include("../assets/js/ws_js.php") ?>
</body>

</html>