<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','1');
require_once "connection.php";
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Workout Website</title>
    <link rel="stylesheet" href="stylesheet.css" />
</head>
<body>
<header>
    <h1 class="center"><?php echo $pagetitle; ?></h1>
    <nav><?php require_once "navigation.php"; ?></nav>
</header>
<main>
