<?php
$pagetitle = "Add Leg Workout";
include_once "header.php";
?>
<body>
<a href="displaylegworkout.php">Back</a>
<br/><br/>
<fieldset>
    <legend>New Leg Workout</legend>
<form action="addlegworkout.php" method="post" name="addlegworkout">
    <table width="30%">
        <tr>
            <td>Workout Name</td>
            <td><input type="text" name="workoutname"></td>
        </tr>
        <tr>
            <td>Workout Reps</td>
            <td><input type="text" name="reps"></td>
        </tr>
        <tr>
            <td>Workout Sets</td>
            <td><input type="text" name="sets"></td>
        </tr>
        <tr>
            <td>Calories</td>
            <td><input type="text" name="calories"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>
</fieldset>
</body>