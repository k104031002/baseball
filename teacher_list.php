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
                    <th>顯示</th>
                    <th>編輯</th>
                    <th>刪除</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                foreach ($rows as $teacher) :
                ?>
                    <tr>
                        <td class="col-lg-3"><img class="object-fit-cover" src="../baseball/assets/img/teacher_img/<?= $teacher["photo"] ?>" alt="<?= $teacher["name"] ?>"></td>
                        <td><?= $teacher["name"] ?></td>
                        <td><?= $teacher["description"] ?></td>
                        <td><a class="btn btn-primary" href="teacher.php?id=<?= $teacher["id"] ?>" role="button"><i class="fa-regular fa-eye"></i></a></td>
                        <td><a class="btn btn-primary" name="" id="" role="button" href="edit_teacher.php"><i class="fa-solid fa-pen"></i></a></td>
                        <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confrimModal"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
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
                                    <a role="button" class="btn btn-danger" href="doDeleteTeacher.php?id=<?= $teacher['id'] ?>">確潤</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    </div>

    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>