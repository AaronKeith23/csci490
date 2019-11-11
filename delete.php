<?php
include("connection.php");
require_once 'header.php';
//getting id of the data from url
$id = $_GET['id'];
//deleting the row from table
$sql = "DELETE FROM workout WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(array(':id' => $id));
//redirecting to the display page (index.php in our case)
header("Location:allwork.php");
