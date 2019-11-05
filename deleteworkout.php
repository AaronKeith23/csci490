<?php
require_once 'header.php';

//check if id is empty
if(empty($_GET['id'])){
    die('id is empty');
}
//connect to sql database
//connnetDb();

$id=intval($_GET['id']);


try{
    $pdo->query("DELETE FROM workout WHERE id=$id");

}
catch (PDOException $e) {
    die( $e->getMessage() );
}
header("Location:allwork.php");

?>
