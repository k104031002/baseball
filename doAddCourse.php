<?php

require_once("../baseball/db_connect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入";
    exit;
}

$name=$_POST["name"];
$type=$_POST["type"];
$price=$_POST["price"];
$teacher=$_POST["teacher_id"];
$course_start=$_POST["course_start"];
$course_end=$_POST["course_end"];
$description=$_POST["description"];
$photo=$_POST["photo"];

if(empty($name) || empty($price) ){
    echo "請填入必要欄位";
    exit;
}

$now=date('Y-m-d H:i:s');

$sql="INSERT INTO course (name, type, price, teacher_id, course_start, course_end,description, photo,created_at, valid)VALUES('$name','$type','$price', '$teacher','$course_start','$course_end','$description','$photo','$now', 1)";

// echo $sql;
// exit;

if($conn->query($sql)){
    echo "新增資料完成";
    // $last_id = $conn->insert_id;
    // echo ", id 為$last_id";  //可以顯示此筆資料為資料庫第幾筆
}else{
    echo "新增資料錯誤". $conn->error;
}

$conn->close();

header("location: course_list.php");










