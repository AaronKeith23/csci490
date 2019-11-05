<?php
/**
 * Created by PhpStorm
 * User: amkeith
 * Date: 10/6/2019
 * Time: 10:51 pm
 */
$currentfile = "";

?>
<div class="topnav">
<ul>
    <?php
    echo ($currentfile == "index.php") ? "<li>Home</li>" : "<li><a href='index.php'>Home</a></li>";
    if(!isset($_SESSION['username'])){echo "<li><a href='login.php'>Login</a></li>";}
    if(isset($_SESSION['username'])){echo "<li><a href='logout.php'>Logout</a></li>";}
    echo ($currentfile == "createworkoutuser.php") ? "<li>Create New Account</li>" : "<li><a href='createworkoutuser.php'>Create New Account</a></li>";
    if(isset($_SESSION['username'])){echo "<li><a href='displayarmworkout.php'>Arm Workouts</a></li>";}
    if(isset($_SESSION['username'])){echo "<li><a href='displaychestworkout.php'>Chest Workouts</a></li>";}
    if(isset($_SESSION['username'])){echo "<li><a href='displaylegworkout.php'>Leg Workouts</a></li>";}
    if(isset($_SESSION['username'])){echo "<li><a href='allwork.php'>Workout Plan Chosen</a></li>";}
    ?>
</ul>
</div>
