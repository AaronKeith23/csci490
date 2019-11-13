<?php
include("connection.php");
require_once 'header.php';
//getting id of the data from url
$formdata['workoutname'] = trim($_GET['workoutname']);
$formdata['reps'] = trim($_GET['reps']);
$formdata['sets'] = trim($_GET['sets']);
$formdata['calorielist'] = trim($_GET['calories']);

//deleting the row from table
$sql = "INSERT INTO workout(workoutname, reps, sets,calorielist) VALUES(:workoutname, :reps, :sets,:calorielist)";
$query = $pdo->prepare($sql);
$query->bindValue(':workoutname', $formdata['workoutname']);
$query->bindValue(':reps',$formdata['reps'] );
$query->bindValue(':sets', $formdata['sets']);
$query->bindValue(':calorielist', $formdata['calorielist']);
$query->execute();
//$query->execute(array(':id' => $id));
//redirecting to the display page (allwork.php in our case)
header("Location:allwork.php");
