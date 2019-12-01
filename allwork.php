<?php
$pagetitle = "Chosen Workout Plan";
require_once 'header.php';
?>
<html>
<body>
<a href="add.html">Add New Workout</a><br/><br/>

<table width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
        <td>Workout Name</td>
        <td>Reps</td>
        <td>Sets</td>
        <td>Calories</td>
        <td>Action</td>
    </tr>
    <?php
    $result = $pdo->query("SELECT * FROM workout ORDER BY id DESC");
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['workoutname']."</td>";
        echo "<td>".$row['reps']."</td>";
        echo "<td>".$row['sets']."</td>";
        echo "<td>".$row['calorielist']."</td>";
        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
    </table>
</body>
</html>
