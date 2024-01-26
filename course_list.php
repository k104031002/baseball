<?php
require_once("../baseball/db_connect.php");

$sqlAll="SELECT * FROM course WHERE valid=1";
$resultAll=$conn->query($sqlAll);
$courseTotalCount=$resultAll->num_rows;
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
                    <th>照片</th>
                    <th>名稱</th>
                    <th>種類</th>
                    <th>介紹</th>
                    <th>價格</th>
                    <th>配合教練</th>
                    <th>開課時間</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
            

        </div>
    </div>

    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>