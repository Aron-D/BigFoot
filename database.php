<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";

try {
    $database = new PDO("mysql:host=$servername;dbname=bigfoot", $username, $password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

  function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$title</title>
    </head>
    <nav>
    <img src="img/BigfootLogo.jpg" style="width: 150px;">
    </nav>
    EOT;
  }

  function template_header_loggedin($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="">
    <title>$title</title>
    </head>
    <nav style="position: sticky; top: 0%;">
    <a href="dashboard.php"><img src="img/BigfootLogo.jpg" style="width: 150px;"></a>
    <a href="index.php?logout=true"><img src="pictogrammen/logout.png" style="width: 60px; float: right;"></a>
    </nav>
    EOT;
  }

?>