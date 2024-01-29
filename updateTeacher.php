<?php
require_once("../baseball/db_connect.php");

if(!isset($_POST["name"])){
    die("請循正常管道進入");
}

$name=$_POST["name"];
$description=$_POST["description"];
$id=$_POST["id"];

$sql="UPDATE teacher SET name='$name',description='$description' WHERE id=$id";

if ($conn->query($sql)===TRUE){
    echo "更新成功";
}else{
    echo "更新資料錯誤: ".$conn->error;
}

$conn->close();

header("location:teacher.php?id=$id");