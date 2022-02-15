<?php
include "database.php";
include "function.php";
template_header_loggedin('product_toevoegen');

if(!empty($_POST)) {
add($_POST);
}

if(!empty($_SESSION['user']) && $_SESSION['role'] == 1) {
    
    $content = "<form method='post'>";
    $content .= "<select name='type'>";
    $content .= "<option value='brand'>Brand</option>";
    $content .= "<option value='model'>Model</option>";
    $content .= "<option value='size'>Size</option>";
    $content .= "<input type='text' name='product' placeholder='Voer hier uw product'>";
    $content .= "<input type='submit' name='submit' value='invoegen'>";
    $content .= "</form>";
    echo $content;

    return;

} elseif(!empty($_SESSION['user']) && $_SESSION['role'] == 2) {
    
    $content = "<form method='post'>";
    $content .= "<select name='type'>";
    $content .= "<option value='brand'>Brand</option>";
    $content .= "<input type='text' name='product' placeholder='Voer hier uw product'>";
    $content .= "<input type='submit' name='submit' value='invoegen'>";
    $content .= "</form>";
    echo $content;

    return;


} elseif(!empty($_SESSION['user']) && $_SESSION['role'] == 3) {
    
    $content = "<form method='post'>";
    $content .= "<select name='type'>";;
    $content .= "<option value='model'>Model</option>";
    $content .= "<input type='text' name='product' placeholder='Voer hier uw product'>";
    $content .= "<input type='submit' name='submit' value='invoegen'>";
    $content .= "</form>";
    echo $content;

    return;


} elseif(!empty($_SESSION['user']) && $_SESSION['role'] == 4) {
    
    $content = "<form method='post'>";
    $content .= "<select name='type'>";
    $content .= "<option value='size'>Size</option>";
    $content .= "<input type='text' name='product' placeholder='Voer hier uw product'>";
    $content .= "<input type='submit' name='submit' value='invoegen'>";
    $content .= "</form>";
    echo $content;

    return;


} else {header("location: index.php");}
?>