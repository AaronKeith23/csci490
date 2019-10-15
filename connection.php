<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 9/29/2019
 * Time: 6:55 PM
 */

//establish Connection
try{
    $connString = "mysql:host=localhost;dbname=csci22501fa18";
    $user = "csci22501fa18";
    $pass = "csci22501fa18!";
    $pdo = new PDO($connString,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE workout(
     id INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(300) NOT NULL,
     calorielist INT(300) NOT NULL,
)";
    $pdo->exec($sql);

}
catch (PDOException $e)
{
    die( $e->getMessage() );
}
