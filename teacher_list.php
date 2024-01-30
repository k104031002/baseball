<?php
require_once("../baseball/db_connect.php");

$perPage = 5;
$sqlAll = "SELECT * FROM teacher WHERE valid=1";
$resultAll = $conn->query($sqlAll);
$teacherTotalCount = $resultAll->num_rows;

$pageCount = ceil($teacherTotalCount / $perPage); // ceil 無條件進位

if (isset($_GET["order"])) {
    $order = $_GET["order"];

    if ($order == 1) {
        $orderString = "ORDER BY id ASC";
    } elseif ($order == 2) {
        $orderString = "ORDER BY id DESC";
    }
};

if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $sql = "SELECT * FROM teacher WHERE name LIKE '%$search%' AND valid=1 ";
} elseif (isset($_GET["p"])) {
    $p = $_GET["p"];
    $startIndex = ($p - 1) * $perPage;
    $sql = "SELECT * FROM teacher WHERE valid=1 $orderString LIMIT  $startIndex, $perPage";
} else {
    $p = 1;
    $order = 1;
    $orderString = "ORDER BY id ASC";
    $sql = "SELECT * FROM teacher WHERE valid=1  $orderString LIMIT $perPage";
}

// $sql = "SELECT * FROM teacher WHERE valid=1";
$result = $conn->query($sql);

if (isset($_GET["search"])) {
    $teacherCount = $result->num_rows;
} else {
    $sqlAll = "SELECT * FROM teacher WHERE valid=1";
    $resultAll = $conn->query($sqlAll);
    $teacherCount = $resultAll->num_rows;
}

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
        <div class="py-2">
            <div class="row g-3">
                <?php if (isset($_GET["search"])) : ?>
                    <div class="col-auto">
                        <a href="teacher_list.php" class="btn btn-primary" name="" id="" role="button">
                            <i class="fa-solid fa-angle-left fa-fw"></i>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="col">
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" placeholder="姓名" aria-label="Recipient's teachername" aria-describedby="button-addon2" name="search" <?php if (isset($_GET["search"])) :
                                                                                                                                                                                $searchValue = $_GET["search"];
                                                                                                                                                                            ?> value="<?= $searchValue ?>" <?php endif ?>> <!--php 這串為持續顯示自己搜尋的字串 -->
                            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between pb-2 align-items-center">
            <div>
                共 <?= $teacherCount ?> 人
            </div>
            <div>
            <a class="btn btn-primary" href="addTeacher.php"><i class="fa-solid fa-user-plus"></i></a>
            </div>
        </div>
        <?php if(!isset($_GET["search"])): ?>
        <div class="py-2 justify-content-end d-flex align-items-center">
            <div class="btn-group ">
            <a <?php if($order==1) echo "active"?> class="btn btn-primary" href="teacher_list.php?order=1&p=<?=$p?>"><i class="fa-solid fa-arrow-up-1-9"></i></a>
            <a <?php if($order==2) echo "active"?> class="btn btn-primary" href="teacher_list.php?order=2&p=<?=$p?>"><i class="fa-solid fa-arrow-up-9-1"></i></a>
            </div>
        </div>
            <?php endif;?>
            <?php
        if ($teacherCount > 0) :
        ?>
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
                        <td><h3><?= $teacher["name"] ?></h3></td>
                        <td><?= $teacher["description"] ?></td>
                        <td><a class="btn btn-primary" href="teacher.php?id=<?= $teacher["id"] ?>" role="button"><i class="fa-regular fa-eye"></i></a></td>
                        <td><a class="btn btn-primary" name="" id="" role="button" href="edit_teacher.php?id=<?= $teacher["id"] ?>"><i class="fa-solid fa-pen"></i></a></td>
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
        <?php if (!isset($_GET["search"])): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for($i=1;$i<=$pageCount;$i++): ?>
                    <li class="page-item <?php if($i==$p)echo "active"?>">
                    <a class="page-link" href="teacher_list.php?order=<?=$order?>&p=<?=$i?>">
                    <?=$i?>
                </a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
            <?php endif; ?>
    </div>
    <?php else : ?>
            沒有使用者
        <?php endif; ?>
    </div>

    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>