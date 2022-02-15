<?php
include "database.php";
include "function.php";
template_header_loggedin('product_overzicht');

// if(!empty($_POST)) {
    // }

if(isset($_GET['sid'])) {

    $result = $database->query("SELECT * FROM sizes WHERE id = '".$_GET['sid']."'")->fetchAll();

    foreach($result as $key => $row) {

    print_r("Huidige naam: ".$row['name']."</br>");
    }

    echo    "<form method='post'>";
    echo    "<input type='text' name='product' placeholder='Voer hier uw wijziging'>";
    echo    "<input type='submit' name='submit' value='Wijzigen'>";
    echo    "</form>";
    edit($_POST, 'sizes', $_GET['sid']);
    
    
}
    if(isset($_GET['mid'])) {

        $result = $database->query("SELECT * FROM models WHERE id = '".$_GET['mid']."'")->fetchAll();
    
        foreach($result as $key => $row) {
    
        print_r("Huidige naam: ".$row['name']."</br>");
        }

        echo    "<form method='post'>";
        echo    "<input type='text' name='product' placeholder='Voer hier uw wijziging'>";
        echo    "<input type='submit' name='submit' value='Wijzigen'>";
        echo    "</form>";
        edit($_POST, 'models', $_GET['mid']);
        
        
    }

        if(isset($_GET['bid'])) {

            $result = $database->query("SELECT * FROM brands WHERE id = '".$_GET['bid']."'")->fetchAll();
        
            foreach($result as $key => $row) {
        
            print_r("Huidige naam: ".$row['name']."</br>");
            }

            echo    "<form method='post'>";
            echo    "<input type='text' name='product' placeholder='Voer hier uw wijziging'>";
            echo    "<input type='submit' name='submit' value='Wijzigen'>";
            echo    "</form>";
            edit($_POST, 'brands', $_GET['bid']);
            
            
}


?>

