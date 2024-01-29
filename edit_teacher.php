<?php
if (!isset($_GET["id"])) {
    $id = 0;
} else {
    $id = $_GET["id"];
}

require_once("../baseball/db_connect.php");

$sql = "SELECT * FROM teacher WHERE id=$id AND valid=1";
$result = $conn->query($sql);


$rowCount=$result->num_rows;


?>

<!doctype html>
<html lang="en">

<head>
    <title>教練資料編輯Coach Edit</title>
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
        $row = $result->fetch_assoc();
        ?>
        <div class="row g-3">
            <div class="col-md-6">
                <img class="img-fluid" src="../baseball/assets/img/teacher_img/<?= $row["photo"] ?>" alt="<?= $row["name"] ?>">
            </div>
            <div class="col-md-6 border">
            <form action="updateTeacher.php" method="post">
                <input type="hidden" name="id" value="<?=$row["id"]?>">
                <table class="table table-bordered">
                    <tr>
                        <th>姓名</th>
                        <td><input type="text" class="form-control" value="<?= $row["name"] ?>" name="name"></td>
                    </tr>
                    <tr>
                        <th>介紹</th>
                        <td><input type="text" class="form-control" value="<?= $row["description"] ?>" name="description"></td>
                    </tr>
                </table>
                <div class="pb-2">
                    <button type="submit" class="btn btn-primary">
                        儲存
                    </button>
                </div>

            </form>
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