<?php


function upload($file) {

global $database;

    $model = null;
    $brand = null;
    $size = null; 

    $row = 1;
if (($handle = fopen($file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, "%")) !== FALSE) {
        if($row == 1){ $row++; continue; }
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }

        if (!empty($data[0])) {

        $selectBrand = 'SELECT * FROM brands WHERE name = "'.$data[0].'"';

        $brands = $database->query($selectBrand)->fetchAll();

        if(empty($brands)) {

        $insertBrand = $database->prepare("INSERT INTO brands SET name = :name");
        $insertBrand->bindParam(":name", $data[0]);
        $insertBrand->execute();

        $brand = $database->lastInsertId();
            if (empty($brand)) {
                $brandId = $database->lastInsertId();
            }
            else {
                $brandId = $brand;
            }
        
        // $insertBrandModel = $database->prepare("INSERT INTO brands_models SET brands_id = :id");
        // $insertBrandModel->bindParam(":id", $brandId);
        // $insertBrandModel->execute();

        // die();
        // if(empty($brandId)) {

        // }

    }
}

        if (!empty($data[1])) {

        $selectModel = 'SELECT * FROM models WHERE name = "'.$data[1].'"';
        $models = $database->query($selectModel)->fetchAll();

        if(empty($models)) {

        $insertModel = $database->prepare("INSERT INTO models SET name = :name");
        $insertModel->bindParam(":name", $data[1]);
        $insertModel->execute();

        
            $model = $database->lastInsertId();
            if (empty($model)) {
                $modelId = $database->lastInsertId();
            }
            else {
                $modelId = $model;
            }
        


    }
}

        if (!empty($data[2])) {

        $selectSize = 'SELECT * FROM sizes WHERE name = "'.$data[2].'"';
        $sizes = $database->query($selectSize)->fetchAll();

        if(empty($sizes)) {

        $insertSize = $database->prepare("INSERT INTO sizes SET name = :name");
        $insertSize->bindParam(":name", $data[2]);
        $insertSize->execute();

        $size = $database->lastInsertId();
        if (empty($size)) {
            $sizeId = $database->lastInsertId();
        }
        else {
            $sizeId = $size;
        }
        
        // $insertModelSize = $database->prepare("INSERT INTO models_sizes SET sizes_id = :id");
        // $insertModelSize->bindParam(":id", $sizeId);
        // $insertModelSize->execute();

        // $selectModelId = 'SELECT id from models';
        // $id = $database->query($selectModelId)->fetchAll();




        }
    }

    $insertBrandModel2 = $database->prepare("INSERT INTO brands_models SET models_id = :mid, brands_id = :bid");
    $insertBrandModel2->bindParam(":mid", $modelId);
    $insertBrandModel2->bindParam(":bid", $brandId);
    $insertBrandModel2->execute();

    $insertModelSize2 = $database->prepare("INSERT INTO models_sizes SET models_id = :mid, sizes_id = :sid");
    $insertModelSize2->bindParam(":mid", $modelId);
    $insertModelSize2->bindParam(":sid", $sizeId);
    $insertModelSize2->execute();

}
        // $insertModel = $database->query("INSERT INTO models (name) VALUE('$data[1]')");

        // $insertSize  = $database->query("INSERT INTO sizes (name) VALUE('$data[2]')");

        

        }
    fclose($handle);
    }


function clearAll() {

    global $database;

    $database->query("DELETE FROM brands_models");
    $database->query("DELETE FROM models_sizes");
    $database->query("DELETE FROM models");
    $database->query("DELETE FROM sizes");
    $database->query("DELETE FROM brands");

    Echo "Alle gegevens zijn verwijderd!";
    return;
    
}
// class CRUD {

//     private $database = null;

//     function __construct($database) {
//         $this->database = $database;
//       }

function add($post = array()) {

    global $database;

    if(isset($post['submit']) && $post['type'] == 'brand' ) {
        
        $name = $post['product'];


        $database->query("INSERT INTO brands SET name = '".$name."'");

        
        echo "Uw brand keuze is voldaan";
    }

    if(isset($post['submit']) && $post['type'] == 'model' ) {

        $name = $post['product'];


        $database->query("INSERT INTO models SET name = '".$name."'");


        echo "Uw model keuze is voldaan";
    }

    if(isset($post['submit']) && $post['type'] == 'size' ) {

        $name = $post['product'];


        $database->query("INSERT INTO sizes SET name = '".$name."'");


        echo "Uw size keuze is voldaan";
    }



}

function edit($post = array(), $tablename, $id) {

    global $database;

    if(!empty($_POST)) {
    $database->query("UPDATE $tablename SET name = '".$post['product']."' WHERE id = ".$id."");

    echo "Uw wijziging is voldaan!";
    }

}

function delete($post = array(), $tablename, $id) {

    global $database;

    if(isset($post['yes'])) {
    $database->query("DELETE FROM $tablename WHERE id = ".$id."");

    echo "uw product is verwijderd!";
    }
    if(isset($post['no'])) {
        header('location: dashboard.php');
    }
}
// }

// function read($tablename) {

//     global $database; 
//     $database->query("SELECT * FROM $tablename");
// }

?>