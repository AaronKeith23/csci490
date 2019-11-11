<?php
include_once("connection.php");
require_once 'header.php';
?>
<html>
<head>
    <title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

<table width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
        <td>Workoutname</td>
        <td>reps</td>
        <td>sets</td>
        <td>Action</td>
    </tr>
    <?php
    //connect database
    //connnetDb();
    //Query all the data in the data table, and according to the descending order id
    //$result=$pdo->query("SELECT * FROM workout");
    //$result_count =  $pdo->query("SELECT COUNT(*) FROM workout" );
    //To get the table data row number
    //$result_row = $result_count->fetchColumn();
    //$dataCount=mysql_num_rows($result);
    //echo $dataCount;
    //
    $result = $pdo->query("SELECT * FROM workout ORDER BY id DESC");

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['workoutname']."</td>";
        echo "<td>".$row['reps']."</td>";
        echo "<td>".$row['sets']."</td>";
        echo "<td>".$row['calorielist']."</td>";
        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }


    //for($i=0;$i<$result_row;$i++){
        //$result_arr=$result->fetch(PDO::FETCH_ASSOC);
        //$id=$result_arr['id'];
        //$workoutname=$result_arr['workoutname'];
        //$reps=$result_arr['reps'];
        //$sets=$result_arr['sets'];
        //$age=$result_arr['calorielist'];
        //print_r($result_arr);
        //echo "<tr><td>$id</td><td>$workoutname</td><td>$reps</td><td>$sets</td><td>$calorielist</td><td><a href='editworkout.php?id=$id'>Edit</a> <a href='deleteworkout.php?id=$id'>Delete</a></td></tr>";
    //}
    ?>
    </table>
</body>
</html>
