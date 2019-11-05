<?php
require_once 'header.php';
if(empty($_POST['id'])){
    die('id is empty');
}
if(empty($_POST['name'])){
    die('name is empty');
}
if(empty($_POST['calorielist'])){
    die('calorielist is empty');
}


$id=intval($_POST['id']);
$name=$_POST['name'];
//$calorielist=intval($_POST['calorielist']);


//connect to database
//connnetDb();

//edit data
try{
    $pdo->query("UPDATE workout SET name='$name',calorielist=$calorielist WHERE id=$id");
}catch (PDOException $e){
    die( $e->getMessage() );
}
header("Location:allwork.php");

?>