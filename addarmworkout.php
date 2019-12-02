<?php
//including the database connection file
include_once("connection.php");
$pagetitle = "Add Arm Workout";
require_once 'header.php';
$formdata['workoutname'] = trim($_POST['workoutname']);
$formdata['reps'] = trim($_POST['reps']);
$formdata['sets'] = trim($_POST['sets']);
$formdata['calories'] = trim($_POST['calories']);

if(isset($_POST['Submit'])) {


    // checking empty fields
    if(empty($formdata['workoutname']) || empty($formdata['reps']) || empty($formdata['sets'] )||empty($formdata['calories'])) {

        if(empty($formdata['workoutname'])) {
            echo "<span style=\"color: red; \">Name field is empty.</span><br/>";
        }

        if(empty($formdata['reps'])) {
            echo "<span style=\"color: red; \">reps field is empty.</span><br/>";
        }

        if(empty($formdata['sets'])) {
            echo "<span style=\"color: red; \">sets field is empty.</span><br/>";
        }
        if(empty($formdata['calories'])) {
            echo "<span style=\"color: red; \">calories field is empty.</span><br/>";
        }

        //link to the previous page
        //echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $sql = "INSERT INTO armworkout(workoutname, reps, sets,calories) VALUES(:workoutname, :reps, :sets,:calories)";
        $query = $pdo->prepare($sql);

        $query->bindValue(':workoutname', $formdata['workoutname']);
        $query->bindValue(':reps',$formdata['reps'] );
        $query->bindValue(':sets', $formdata['sets']);
        $query->bindValue(':calories', $formdata['calories']);
        $query->execute();


        //display success message
        echo "<span style=\"color: green; \">Data added successfully.";
        echo "<br/><a href='displayarmworkout.php'>View Result</a>";
    }
}
?>
<form action="addarmworkout.php" method="post" name="addarmworkout">
    <table>
        <tr>
            <td>WorkoutName</td>
            <td><input type="text" name="workoutname"></td>
        </tr>
        <tr>
            <td>Workout reps</td>
            <td><input type="text" name="reps"></td>
        </tr>
        <tr>
            <td>Workout sets</td>
            <td><input type="text" name="sets"></td>
        </tr>
        <tr>
            <td>Calorielist</td>
            <td><input type="text" name="calories"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>
</body>

</html>
