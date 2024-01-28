<?php
require_once("../baseball/db_connect.php");

$sqlAll="SELECT * FROM course WHERE valid=1";
$resultAll=$conn->query($sqlAll);
$courseTotalCount=$resultAll->num_rows;

$sql="SELECT * FROM course WHERE valid=1";
$result=$conn->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <title>課程列表Course</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php include("../baseball/assets/css/ws_css.php") ?>
</head>

<body>
    <div class="container">
        <h1>課程列表</h1>
        <table class="table table-border">
            <thead>
                <tr>
                    <th></th>
                    <th>照片</th>
                    <th>名稱</th>
                    <th>種類</th>
                    <th>介紹</th>
                    <th>價格</th>
                    <th>配合教練</th>
                    <th>開課時間</th>
                    <th>結束時間</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    foreach ($rows as $course) :
                    ?>
                <tr>
                <td><a class="btn btn-primary" href="course.php?id=<?=$course["id"]?>" role="button"><i class="fa-regular fa-eye"></i></a></td>
                    <td class="col-lg-3"><img class="object-fit-cover" src="../baseball/assets/img/course_img/<?=$course["photo"]?>" alt="<?=$course["name"]?>"></td>
                    <td><?=$course["name"]?></td>
                    <td><?=$course["type"]?></td>
                    <td><?=$course["description"]?></td>
                    <td><?=$course["price"]?></td>
                    <td><?=$course["teacher_id"]?></td>
                    <td><?=$course["course_start"]?></td>
                    <td><?=$course["course_end"]?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            

        </div>
    </div>

    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>