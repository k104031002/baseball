<?php
require_once("../baseball/db_connect.php");

if(!isset($_POST["name"])){
    die("請循正常管道進入");
}

$name=$_POST["name"];
$type=$_POST["type"];
$price=$_POST["price"];
$teacher=$_POST["teacher_id"];
$description=$_POST["description"];
$course_start=$_POST["course_start"];
$course_end=$_POST["course_end"];
$id=$_POST["id"];

$sql="UPDATE course SET name='$name',type='$type',price='$price',teacher_id='$teacher',description='$description',course_start='$course_start',course_end='$course_end' WHERE id=$id";

if ($conn->query($sql)===TRUE){
    echo "更新成功";
}else{
    echo "更新資料錯誤: ".$conn->error;
}

$conn->close();

header("location:course.php?id=$id");