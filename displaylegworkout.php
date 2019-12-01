<?php
$pagetitle = "Display Leg Workout";
include_once "header.php";
?>
<body>
<a href="addleg.php">Add New Leg Workout</a><br/><br/>
<?php
try{
    //query the data
    $sql = "SELECT * FROM legworkout";
    $result = $pdo->query($sql);
    ?>
    <?php
    echo "<table class='center'>
            <h2>Leg Workout Options</h2>
            <tr><th>Workout Name</th><th>Reps</th><th>Sets</th><th>Calories</th><th>Action</th></tr>";
    //loop through the results and display to the screen
    foreach ($result as $row){
        echo "<tr><td>{$row['workoutname']}</td><td>" .$row['reps']."</td><td>" .$row['sets']."</td><td>{$row['calories']}</td><td><a href=\"add.php?workoutname=$row[workoutname] & reps=$row[reps] & sets=$row[sets] & calories=$row[calories]\" onClick=\"return confirm('Are you sure you want to add this workout?')\">Add workout</a></td>"; "</tr>";
    }
    echo "</table>";
}
catch (PDOException $e){
    die( $e->getMessage() );
}
require_once "footer.php";
?>
</table>
</body>