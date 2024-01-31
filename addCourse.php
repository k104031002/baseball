<!doctype html>
<html lang="en">

<head>
    <title>新增課程Add Course</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php include("../baseball/assets/css/ws_css.php") ?>
</head>

<body>
    <div class="container">
        <?php
        echo date('Y-m-d H:i:s');
        ?>

        <form action="doAddCourse.php" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center row g-3">
                <div class="col-lg-4">
                    <label for="">課程名稱</label>
                    <input type="text" class="form-control" name="name">
                    <label for="">類型</label>
                    <input type="text" class="form-control" name="type">
                    <label for="">價格</label>
                    <input type="text" class="form-control" name="price">
                    <label for="">配合教練</label>
                    <input type="text" class="form-control" name="teacher_id">
                    <label for="">開課時間</label>
                    <input type="datetime-local" class="form-control" name="course_start">
                    <input type="datetime-local" class="form-control" name="course_end">
                    <label for="">介紹</label>
                    <textarea type="text" class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                    <label for="">請選擇宣傳照</label>
                    <input type="file" class="form-control" name="photo">
                    <div class="py-2 d-flex justify-content-between">
                        <a class="btn btn-primary" href="course_list.php" role="button">
                            <i class="fa-solid fa-arrow-left"></i>返回課程列表
                        </a>
                        <button type="submit" class="btn btn-primary">
                            送出
                        </button>
                    </div>
                </div>
            </div>
        </form>


    </div>



    <?php include("../baseball/assets/js/ws_js.php") ?>
</body>

</html>