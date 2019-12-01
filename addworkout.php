<?php

$pagetitle = "Added Workout";
require_once 'header.php';
$formdata['workoutname'] = trim($_POST['workoutname']);
$formdata['reps'] = trim($_POST['reps']);
$formdata['sets'] = trim($_POST['sets']);
$formdata['calorielist'] = trim($_POST['calorielist']);

if(isset($_POST['Submit'])) {
    //$workoutname = $_POST['workoutname'];
   // $reps = $_POST['reps'];
    //$sets = $_POST['sets'];
    //$calorielist = $_POST['calorielist'];

    // checking empty fields
    if(empty($formdata['workoutname']) || empty($formdata['reps']) || empty($formdata['sets'] )||empty($formdata['calorielist'])) {

        if(empty($formdata['workoutname'])) {
            echo "<span style=\"color: red; \">Name field is empty.</span><br/>";
        }

        if(empty($formdata['reps'])) {
            echo "<span style=\"color: red; \">reps field is empty.</span><br/>";
        }

        if(empty($formdata['sets'])) {
            echo "<span style=\"color: red; \">sets field is empty.</span><br/>";
        }
        if(empty($formdata['calorielist'])) {
            echo "<span style=\"color: red; \">Calorielist field is empty.</span><br/>";
        }

        //link to the previous page
        //echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $sql = "INSERT INTO workout(workoutname, reps, sets,calorielist) VALUES(:workoutname, :reps, :sets,:calorielist)";
        $query = $pdo->prepare($sql);

        $query->bindValue(':workoutname', $formdata['workoutname']);
        $query->bindValue(':reps',$formdata['reps'] );
        $query->bindValue(':sets', $formdata['sets']);
        $query->bindValue(':calorielist', $formdata['calorielist']);
        $query->execute();

        //display success message
        echo "Data added successfully!";
        echo "<br/><a href='allwork.php'>View Result</a>";
    }
}
?>
</body>


