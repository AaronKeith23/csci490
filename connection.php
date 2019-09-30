<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 9/30/2019
 * Time: 11:37 AM
 */

try{
    $connString = "mysql:host=localhost;dbname=csci22501fa18"; //if doesnt work change to just localhost
    $user = "csci22501fa18";
    $pass = "csci22501fa18!";
    $pdo = new PDO($connString,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    die( $e->getMessage() );
}