<?php
include "database.php";

template_header_loggedin('dashboard');

if(!empty($_SESSION['user']) && $_SESSION['role'] == 1) {

    $content = "<div style='top: 16%; position: absolute; text-decoration: underline overline wavy black;'>";
    $content .= "<a style='text-decoration: none;' href='overview.php?brands'>Overzicht brands</a> <br/><br/>";
    $content .= "<a style='text-decoration: none;' href='overview.php?models'>Overzicht models</a> <br/><br/>";
    $content .= "<a style='text-decoration: none;' href='overview.php?sizes'>Overzicht Sizes</a> <br/><br/>";
    $content .= "<a style='text-decoration: none;' href='add.php'>Brand/Model/Size Toevoegen</a>";
    $content .= "</div>";

    echo $content;
    return;
    
} elseif(!empty($_SESSION['user']) && $_SESSION['role'] == 2) {

    $content = "<div style='top: 16%; position: absolute; text-decoration: underline overline wavy black;'>";
    $content .= "<a style='text-decoration: none;' href='overview.php?brands'>Overzicht brands</a> <br/><br/>";
    $content .= "<a style='text-decoration: none;' href='add.php'>Brand Toevoegen</a>";
    $content .= "</div>";

    echo $content;
    return;
    
} elseif(!empty($_SESSION['user']) && $_SESSION['role'] == 3) {

    $content = "<div style='top: 16%; position: absolute; text-decoration: underline overline wavy black;'>";
    $content .= "<a style='text-decoration: none;' href='overview.php?models'>Overzicht models</a> <br/><br/>";
    $content .= "<a style='text-decoration: none;' href='add.php'>Model Toevoegen</a>";
    $content .= "</div>";

    echo $content;
    
} elseif(!empty($_SESSION['user']) && $_SESSION['role'] == 4) {

    $content = "<div style='top: 16%; position: absolute; text-decoration: underline overline wavy black;'>";
    $content .= "<a style='text-decoration: none;' href='overview.php?sizes'>Overzicht Sizes</a> <br/><br/>";
    $content .= "<a style='text-decoration: none;' href='add.php'>Size Toevoegen</a>";
    $content .= "</div>";

    echo $content;
    
} else {header("location: index.php");}
?>





