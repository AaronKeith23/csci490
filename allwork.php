<?php
require_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ALL Workouts</title>
    <style>
        table{
            border-collapse: collapse;
        }
        th,td{
            border:1px solid #ccccff;
            padding: 5px;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
<a href="adduser.html">Add workout</a>
<table>
    <tr><th>id</th><th>WorkName</th><th>Calorielist</th><th>Edit/Delete</th></tr>
    <?php
    //connect database
    connnetDb();
    //Query all the data in the data table, and according to the descending order id
    $result=$pdo->query("SELECT * FROM workout ORDER BY id DESC");
    $result_count =  $pdo->query("SELECT COUNT(*) FROM workout" );
    //To get the table data row number
    $result_row = $result_count->fetchColumn();
    //$dataCount=mysql_num_rows($result);
    //echo $dataCount;
    //


    for($i=0;$i<$result_row;$i++){
        $result_arr=$result->fetch(PDO::FETCH_ASSOC);
        $id=$result_arr['id'];
        $name=$result_arr['name'];
        $age=$result_arr['calorielist'];
        //print_r($result_arr);
        echo "<tr><td>$id</td><td>$name</td><td>$calorielist</td><td><a href='editworkout.php?id=$id'>Edit</a> <a href='deleteworkout.php?id=$id'>Delete</a></td></tr>";
    }
    ?>
</table>
</body>
</html>
