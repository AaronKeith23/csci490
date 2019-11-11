<?php
include_once("connection.php");
require_once 'header.php';
if(isset($_POST['update']))
{
    $formdata['id'] = trim($_POST['id']);

    $formdata['workoutname'] = trim($_POST['workoutname']);
    $formdata['reps'] = trim($_POST['reps']);
    $formdata['sets'] = trim($_POST['sets']);
    $formdata['calorielist'] = trim($_POST['calorielist']);

    // checking empty fields
    if(empty($formdata['workoutname']) || empty($formdata['reps']) || empty($formdata['sets'])||empty($formdata['calorielist'])) {

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
            echo "<span style=\"color: red; \">calorielist field is empty.</span><br/>";
        }
    } else {
        //updating the table
        $sql = "UPDATE workout SET workoutname=:workoutname, reps=:reps, sets=:sets,calorielist=:calorielist WHERE id=:id";
        $query = $pdo->prepare($sql);

        $query->bindValue(':id', $formdata['id']);
        $query->bindValue(':workoutname', $formdata['workoutname']);
        $query->bindValue(':reps', $formdata['reps']);
        $query->bindValue(':sets', $formdata['sets']);
        $query->bindValue(':calorielist', $formdata['calorielist']);

        $query->execute();



        header("Location: allwork.php");
    }
}
?>
<?php
//getting id from url
$formdata['id'] = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM workout WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(array(':id' =>  $formdata['id']));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $formdata['workoutname'] = $row['workoutname'];
    $formdata['reps'] = $row['reps'];
    $formdata['sets'] = $row['sets'];
    $formdata['calorielist']=$row['calorielist'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="allwork.php">All workout</a>
<br/><br/>

<form name="form1" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>workoutName</td>
            <td><input type="text" name="name" value="<?php echo $formdata['workoutname'];?>"></td>
        </tr>
        <tr>
            <td>Reps</td>
            <td><input type="text" name="reps" value="<?php echo $formdata['reps'];?>"></td>
        </tr>
        <tr>
            <td>Sets</td>
            <td><input type="text" name="sets" value="<?php echo $formdata['sets'];?>"></td>
        </tr>
        <tr>
            <td>Calorielist</td>
            <td><input type="text" name="calorielist" value="<?php echo $formdata['calorielist'];?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>