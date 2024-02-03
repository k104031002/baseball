<?php

require_once("./db_connect.php");

if (!isset($_POST["name"])) {
  die("請循正常管道進入");
}

$name = $_POST["name"];
$account = $_POST["account"];
$password = $_POST["password"];
$birthday = $_POST["birthday"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$gender = $_POST["gender"];
// $photo = $_POST["photo"];


$password = md5($password);
if (empty($name) ||  empty($account) || empty($password)) {
  echo "請填入必要欄位";
  exit;
}


$now = date('Y-m-d H:i:s');


$sql = "INSERT INTO user (name, account, password, birthday, phone,  address, gender, created,valid) VALUES ('$name', '$account', '$password', '$birthday', '$phone', '$address', '$gender', '$now', 1) ";



if ($conn->query($sql) === TRUE) {
  echo "新增資料成功";
} else {
  echo "新增資料錯誤: " . $conn->error;
}

header("location: users.php");
