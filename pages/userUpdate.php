<?php

require_once("./db_connect.php");

$sql="UPDATE user SET name='馬思維' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

$conn->close();