<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 9/29/2019
 * Time: 6:55 PM
 */
$pagetitle = "Uploaded Class Files";
include_once "header.php";

try{
    //query the data
    $sql = "SELECT * FROM studentfiles";
    $result = $pdo->query($sql);
    ?>
    <?php
    echo "<table>
            <h2>Students Assignments</h2>
            <tr><th>Student Username</th><th>Assignment Name</th><th>File Type</th></tr>";
    //loop through the results and display to the screen
    foreach ($result as $row){
        echo "<tr><td>{$row['username']}</td><td>" .$row['assignment']."</td><td>{$row['filetype']}</td><td>"; "</tr>";
    }
    echo "</table>";
}
catch (PDOException $e)
{
    die( $e->getMessage() );
}
require_once "footer.php";