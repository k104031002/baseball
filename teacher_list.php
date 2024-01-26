<?php
require_once("../baseball/db_connect.php");

$sqlAll = "SELECT * FROM teacher WHERE valid=1";
$resultAll = $conn->query($sqlAll);
$teacherTotalCount = $resultAll->num_rows;

$sql = "SELECT * FROM teacher WHERE valid=1";
$result = $conn->query($sql);

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
                    <th></th>
                </tr>
            </thead>
        
        <tbody>
        <?php
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                foreach ($rows as $teacher) :
                ?>
            <tr>
                
                    <td><?= $teacher["photo"] ?></td>
                    <td><?= $teacher["name"] ?></td>
                    <td><?= $teacher["description"] ?></td>
                    <td><a class="btn btn-primary" href="teacher.php" role="button"><i class="fa-regular fa-eye"></i></a></td>
                
            </tr>
            <?php endforeach; ?>

        </tbody>
        </table>
    </div>
    </div>

    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>