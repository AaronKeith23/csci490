<?php
require_once 'header.php';
//check if name/calorielist is empty
if(!isset($_POST['name'])){
    die('name is not define');
}
if(!isset($_POST['calorielist'])){
    die('calorielist is not define');
}
$name=$_POST['name'];
$calorielist=$_POST['calorielist'];
if(empty($name)){
    die('name is empty');
}
if(empty($calorielist)){
    die('calorielist is empty');
}
//connect to database
//connnetDb();


//$calorielist=intval($calorielist);
//insert data
try{
    $pdo->query("INSERT INTO workout(name,calorielist) VALUES ('$name',$calorielist)");
}
catch(PDOException $e){
    die( $e->getMessage() );
}
header("Location:allwork.php");


?>

<form action="addworkout.php" method="post">
    <label>WorkoutName：</label><input type="text" name="name">
    <label>Calorielist：</label><input type="text" name="calorielist">
    <input type="submit" value="Submit">
</form>
