<?php

require_once("../baseball/db_connect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入";
    exit;
}

$name=$_POST["name"];
$description=$_POST["description"];
$photo=$_POST["photo"];

if(empty($name) || empty($description) || empty($photo)){
    echo "請填入必要欄位";
    exit;
}


$sql="INSERT INTO teacher (name, description, photo, valid)VALUES('$name','$description','$photo', 1)";

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

header("location: teacher_list.php");










