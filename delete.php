<?php
include "database.php";
include "function.php";
template_header_loggedin('product_overzicht');

if(isset($_GET['sid'])) {

    $result = $database->query("SELECT * FROM sizes WHERE id = '".$_GET['sid']."'")->fetchAll();

    foreach($result as $key => $row) {

    print_r("Weet je zeker dat je:<b> ".$row['name']." </b>wilt verwijderen?</br>");
    }

    echo    "<form method='post'>";
    echo    "<input type='submit' name='yes' value='Ja'> | <input type='submit' name='no' value='Nee'>";
    echo    "</form>";
    delete($_POST, 'sizes', $_GET['sid']);
    
    
}
    if(isset($_GET['mid'])) {

        $result = $database->query("SELECT * FROM models WHERE id = '".$_GET['mid']."'")->fetchAll();
    
        foreach($result as $key => $row) {
    
        print_r("Weet je zeker dat je:<b> ".$row['name']." </b>wilt verwijderen?</br>");
        }

        echo    "<form method='post'>";
        echo    "<input type='submit' name='yes' value='Ja'> | <input type='submit' name='no' value='Nee'>";
        echo    "</form>";
        delete($_POST, 'models', $_GET['mid']);
        
        
    }

        if(isset($_GET['bid'])) {

            $result = $database->query("SELECT * FROM brands WHERE id = '".$_GET['bid']."'")->fetchAll();
        
            foreach($result as $key => $row) {
        
            print_r("Weet je zeker dat je:<b> ".$row['name']." </b>wilt verwijderen?</br>");
            }

            echo    "<form method='post'>";
            echo    "<input type='submit' name='yes' value='Ja'> | <input type='submit' name='no' value='Nee'>";
            echo    "</form>";
            delete($_POST, 'brands', $_GET['bid']);
            
        }

?>
