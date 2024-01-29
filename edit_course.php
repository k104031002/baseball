<?php
if (!isset($_GET["id"])) {
    $id = 0;
} else {
    $id = $_GET["id"];
}

require_once("../baseball/db_connect.php");

$sql = "SELECT * FROM course WHERE id=$id AND valid=1";
$result = $conn->query($sql);


$rowCount = $result->num_rows;


?>

<!doctype html>
<html lang="en">

<head>
    <title>課程資料編輯Course Edit</title>
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
                    <img class="img-fluid" src="../baseball/assets/img/course_img/<?= $row["photo"] ?>" alt="<?= $row["name"] ?>">
                </div>
                <div class="col-md-6">
                    <form action="updateCourse.php" method="post">
                    <input type="hidden" name="id" value="<?=$row["id"]?>">
                        <table class="table table-bordered">
                            <tr>
                                <th>課程名稱</th>
                                <td><input type="text" class="form-control" value="<?= $row["name"] ?>" name="name"></td>
                            </tr>
                            <tr>
                                <th>類型</th>
                                <td><input type="text" class="form-control" value="<?= $row["type"] ?>" name="type"></td>
                            </tr>
                            <tr>
                                <th>價格</th>
                                <td><input type="text" class="form-control" value="<?= $row["price"] ?>" name="price"></td>
                            </tr>
                            <tr>
                                <th>配合教練</th>
                                <td><input type="text" class="form-control" value="<?= $row["teacher_id"] ?>" name="teacher_id"></td>
                            </tr>
                            <tr>
                                <th>更換宣傳照</th>
                                <td><input type="file" class="form-control" name="photo"></td>
                            </tr>
                            <tr>
                                <th>時間</th>
                                <td><input type="datetime-local" class="form-control" value="<?= $row["course_start"] ?>" name="course_start"></td>
                                <td><input type="datetime-local" class="form-control" value="<?= $row["course_end"] ?>" name="course_end"></td>
                            </tr>
                            <tr>
                                <th>介紹</th>
                                <td><textarea type="text" class="form-control"  name="description" id="" cols="30" rows="10"><?= $row["description"] ?></textarea></td>
                                
                            </tr>
                        </table>
                        <div class="pb-2">
                        <button type="submit" class="btn btn-primary">
                            儲存
                        </button>
                    </div>
                    </form>
                  
                    <a class="btn btn-primary" href="course_list.php" role="button">
                        <i class="fa-solid fa-arrow-left"></i>返回課程列表
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>