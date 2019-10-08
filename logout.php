<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 9/29/2019
 * Time: 6:55 PM
 */
session_start();
// Finally, destroy the session.
session_destroy();
session_destroy();
//echo 'username: ' .  $_SESSION['username'];

header('Location: index.php');
header('Location: index.php');

?>