<?php 
    include "database.php"; 
    include_once "function.php";

    $stmt = $database->prepare("SELECT * FROM brands");
    $getData = $stmt->execute();
    $row = $stmt->fetchALL();

    if(empty($_GET)) {  


    
    echo    "<a href='bigfoot-selectbox.php'>Home</a> | Brands";
     foreach($row as $data) {
        // print_r($data);
        // echo "test";
      echo   "<br><br><a href='bigfoot-selectbox.php?brand=".$data['id']."'>".$data['name']."</a>";
        
    
     }
    }


    if(!empty($_GET['brand']) && empty($_GET['size']) && empty($_GET['model'])) {
        
        echo    "<a href='bigfoot-selectbox.php'>Home</a> | <a href='".$_SERVER['REQUEST_URI']."'>Brands</a> | Models";

    $stmt2 = $database->prepare("SELECT bm.id, bm.brands_id, bm.models_id, m.name FROM brands_models AS bm
    INNER JOIN models AS m on m.id = bm.models_id WHERE 1 AND bm.brands_id = '".$_GET['brand']."'");
    $stmt2->execute();
    $row2 = $stmt2->fetchAll();


    foreach($row2 as $data2){
    echo "<br><br><a href='".$_SERVER['REQUEST_URI']."&model=".$data2['models_id']."'>".$data2['name']."</a> <br>";
    }

    }

    // if(!empty($_GET['model'])) {
       if (!empty($_GET['brand']) && !empty($_GET['model']) && empty($_GET['size'])) {
    
        echo    " <a href='bigfoot-selectbox.php'>Home</a> | <a href='bigfoot-selectbox.php?brand=".$_GET['brand']."'>Brands</a> | <a href='".$_SERVER['REQUEST_URI']."'>Models</a> | Size";
    
        $stmt3 = $database->prepare("SELECT s.id, ms.models_id, ms.sizes_id, s.name FROM models_sizes AS ms
        INNER JOIN sizes AS s on s.id = ms.sizes_id WHERE 1 AND ms.models_id = '".$_GET['model']."'");
        $stmt3->execute();
        $row3 = $stmt3->fetchAll();

        foreach($row3 as $data3){
            // echo "<br><br><a href='bigfoot-selectbox.php?brand='".$_GET['brand']."'&model='".$_GET['model']."'&size='".$data3['id']."'>".$data3['name']."</a> <br>";
            echo "<br><br><a href='".$_SERVER['REQUEST_URI']."&size=".$data3['id']."'>".$data3['name']."</a> <br>";
            }
    
        // return;

    }

    if (!empty($_GET['brand']) && !empty($_GET['model']) && !empty($_GET['size'])) {
            //View Brand as result by using SELECT and WHERE GET
            $showBrand = $database->prepare("SELECT * FROM brands WHERE id = '".$_GET['brand']."'");
            $showBrand->execute();
            $viewBrand = $showBrand->fetch(PDO::FETCH_OBJ);
            // view Model as result by using SELECT and WHERE GET
            $showModel = $database->prepare("SELECT * FROM models WHERE id = '".$_GET['model']."'");
            $showModel->execute();
            $viewModel = $showModel->fetch(PDO::FETCH_OBJ);
            // view Size as result by using SELECT and WHERE GET
            $showSize = $database->prepare("SELECT * FROM sizes WHERE id = '".$_GET['size']."'");
            $showSize->execute();
            $viewSize = $showSize->fetch(PDO::FETCH_OBJ);
    
            
            echo  " <a href='bigfoot-selectbox.php'>Home</a> | <a href='bigfoot-selectbox.php?brand=".$_GET['brand']."'>Brands</a> | <a href='bigfoot-selectbox.php?brand=".$_GET['brand']."&model=".$_GET['model']."'>Models</a> | <a href='bigfoot-selectbox.php?brand=".$_GET['brand']."&model=".$_GET['model']."&size=".$_GET['size']."'>Sizes</a> | End <br><br>"; 
        
            echo "Wat een leuke keuze op verassende schoenen! <br><br> Uw gekozen keuzes: <br><br>";

            
            echo     "<b>Brand</b>: ".$viewBrand->name."<br>";
            echo     "<b>Model</b>: ".$viewModel->name."<br>";
            echo     "<b>Sizes</b>: ".$viewSize->name."";

            // print_r("Brand: '".$viewBrand['name']."'<br>
            //          Model: '".$viewModel['name']."'<br>
            //          Size: '".$viewSize['name']."'");
        }
    
?>


