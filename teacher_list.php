<?php
require_once("../baseball/db_connect.php");

$sqlAll="SELECT * FROM teacher WHERE valid=1";
$resultAll=$conn->query($sqlAll);
$teacherTotalCount=$resultAll->num_rows;
?>
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
        <h1>教練列表</h1>
        <table class="table table-border">
            <thead>
                <tr>
                    <th>照片</th>
                    <th>名稱</th>
                    <th>介紹</th>
                </tr>
            </thead>
        </table>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </div>
    </div>

    <?php include("../baseball/ws_js.php") ?>
</body>

</html>