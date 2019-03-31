<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$conn = new mysqli("localhost", "root", "b70c3b2267a0202a", "tech_book");
$result = $conn->query("SELECT Bookname FROM ".$obj->table." LIMIT ".$obj->limit);
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
//echo $result;
echo json_encode($outp);
?>
