<?php
if (!isset($_GET["id"])) {
  $id = 0;
} else {
  $id = $_GET["id"];
}

require_once("./db_connect.php");

$sql = "SELECT * FROM course WHERE id=$id AND valid=1";
$result = $conn->query($sql);


$rowCount = $result->num_rows;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <!-- 網頁favcon -->
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    棒球好玩家-課程編輯
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="./ader.css" rel="stylesheet" />
  <?php include("../assets/css/ws_css.php") ?>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <!-- 回首頁連結 -->
      <a class="navbar-brand m-0" href="">
        <!-- LOGO -->
        <img src=" ../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">棒球好玩家</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- 超連結 -->
          <a class="nav-link text-white" href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">會員管理</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- 超連結 -->
          <a class="nav-link text-white " href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">訂單管理</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- 超連結 -->
          <a class="nav-link text-white active" href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">商品管理</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- 超連結 -->
          <a class="nav-link text-white" href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">租借管理</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- 超連結 -->
          <a class="nav-link text-white" href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">類別管理</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- 超連結 -->
          <a class="nav-link text-white" href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">優惠券管理</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- 超連結 -->
          <a class="nav-link text-white" href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">課程管理</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- 超連結 -->
          <a class="nav-link text-white" href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">文章管理</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <!-- 麵包屑 -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">後臺管理</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">課程</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">課程資料編輯Course Edit</h6>
        </nav>
      </div>
    </nav>
    <div class="container">
      <!-- CODE貼這裡~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
      <?php if ($rowCount == 0) : ?>
        使用者不存在
      <?php else :
        $row = $result->fetch_assoc();
      ?>
        <div class="row g-3">
          <div class="col-md-6">
            <img class="img-fluid" src="../assets/img/course_img/<?= $row["photo"] ?>" alt="<?= $row["name"] ?>">
          </div>
          <div class="col-md-6">
            <form action="updateCourse.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $row["id"] ?>">
              <table class="table table-bordered">
                <tr>
                  <th>課程名稱</th>
                  <td><input type="text" class="form-control" value="<?= $row["name"] ?>" name="name"></td>
                </tr>
                <tr>
                  <th>類型</th>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="打擊" id="" name="type[]" <?php
                                                                                                      $types = explode(",", $row["type"]); // 假設 type 是以逗號分隔的字串，將其轉換為陣列

                                                                                                      foreach ($types as $type) {
                                                                                                        if ($type == "打擊") {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>>
                      <label for="form-check-label">打擊</label>
                      <input class="form-check-input" type="checkbox" value="投球" id="" name="type[]" <?php
                                                                                                      $types = explode(",", $row["type"]); // 假設 type 是以逗號分隔的字串，將其轉換為陣列

                                                                                                      foreach ($types as $type) {
                                                                                                        if ($type == "投球") {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>>

                      <label for="form-check-label">投球</label>

                      <input class="form-check-input" type="checkbox" value="守備" id="" name="type[]" <?php
                                                                                                      $types = explode(",", $row["type"]); // 假設 type 是以逗號分隔的字串，將其轉換為陣列

                                                                                                      foreach ($types as $type) {
                                                                                                        if ($type == "守備") {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>>
                      <label for="form-check-label">守備</label>


                      <input class="form-check-input" type="checkbox" value="體能" id="" name="type[]" <?php
                                                                                                      $types = explode(",", $row["type"]); // 假設 type 是以逗號分隔的字串，將其轉換為陣列

                                                                                                      foreach ($types as $type) {
                                                                                                        if ($type == "體能") {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>>

                      <label for="form-check-label">體能</label>

                      <input class="form-check-input" type="checkbox" value="知識" id="" name="type[]" <?php
                                                                                                      $types = explode(",", $row["type"]); // 假設 type 是以逗號分隔的字串，將其轉換為陣列

                                                                                                      foreach ($types as $type) {
                                                                                                        if ($type == "知識") {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>>

                      <label for="form-check-label">知識</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>價格</th>
                  <td><input type="text" class="form-control" value="<?= $row["price"] ?>" name="price"></td>
                </tr>
                <tr>
                  <th>配合教練</th>
                  <td>
                    <select class="form-select" name="teacher_id" id="">
                      <?php
                      $sqlTeacher = "SELECT * FROM teacher WHERE valid = 1";
                      $result = $conn->query($sqlTeacher);
                      // 检查查询结果是否非空
                      if ($result->num_rows > 0) {
                        // 循环输出所有老师选项
                        while ($rowTeacher = $result->fetch_assoc()) {
                          echo "<option value='" . $rowTeacher['id'] . "'>" . $rowTeacher['name'] . "</option>";
                        }
                      }
                      ?>
                    </select>
                  </td>
                  <!-- <td><input type="text" class="form-control" value="<?= $row["teacher_id"] ?>" name="teacher_id"></td> -->
                </tr>
                <tr>
                  <th>預覽宣傳照</th>
                  <td><img class="img-fluid" id="preview_photo_img" src="#" alt=""></td>
                </tr>
                <tr>
                  <th>更換宣傳照</th>
                  <td><input type="file" class="form-control" name="photo" onchange="readURL(this)" targetID="preview_photo_img"></td>
                </tr>
                <tr>
                  <th>時間</th>
                  <td class="row">
                  <div class="col-6"><input type="datetime-local" class="form-control" value="<?= $row["course_start"] ?>" name="course_start"></div>
                  <div class="col-6"><input type="datetime-local" class="form-control" value="<?= $row["course_end"] ?>" name="course_end"></div>
                  </td>
                  
                </tr>
                <tr>
                  <th>介紹</th>
                  <td><textarea type="text" class="form-control" name="description" id="" cols="30" rows="10"><?= $row["description"] ?></textarea></td>
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


    <!-- End Navbar -->
  </main>
  <!-- 右下設定 -->
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">更改UI</h5>
          <p>請選擇喜愛的配色</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <?php include("./js.php") ?>
  <?php include("../assets/js/ws_js.php") ?>
</body>

</html>