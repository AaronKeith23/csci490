



<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");
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
        echo "<span style=\"color: green; \">Data added successfully.";
        echo "<br/><a href='allwork.php'>View Result</a>";
    }
}
?>
</body>
</html>











//require_once 'header.php';
#check if name/calorielist is empty
//if(!isset($_POST['workoutname'])){
   //die('name is not define');
//}
//if(!isset($_POST['calorielist'])){
    //die('calorielist is not define');
//}

//if(empty($name)){
    //die('name is empty');
//}
//if(empty($calorielist)){
    //die('calorielist is empty');
//}
//connect to database
//connnetDb();



//$calorielist=intval($calorielist);
//insert data
//$workoutname=$_POST['workoutname'];
//$reps=$_POST['reps'];
//$sets=$_POST['sets'];
//$calorielist=$_POST['calorielist'];
//try{

        //$sql= "INSERT INTO workout(workoutname,reps,sets,calorielist) VALUES ('".$_POST["workoutname"]."','".$_POST["reps"]."','".$_POST["sets"].",".$_POST["calorielist"]."')";
        //$stmt = $pdo->prepare($sql);
        //$stmt ->execute([$workoutname,$reps,$sets,$calorielist]);
    //}
    //catch(PDOException $e){
        //die( $e->getMessage() );
    //}

//header("Location:allwork.php");



?>


