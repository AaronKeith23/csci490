<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 9/30/2019
 * Time: 11:41 AM
 */

require_once "connection.php";
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Workout Plan</title>
    <link rel="stylesheet" href="design.css" />
</head>
<body>
<header>
    <h1><?php echo $pagetitle; ?></h1>
    <nav><?php require_once "navigation.php"; ?></nav>
</header>
<main>
    <h2>Workout Application Home Page!</h2>