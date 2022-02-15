<?php
include "database.php";
template_header_loggedin('product_overzicht');

// select van de data om overview te voorbereiden

if(isset($_GET['brands'])) {

$selectBrand = $database->query("SELECT * from brands")->fetchAll();

// echo "<table style='width:100%'>";
// echo "<thead>";
// echo "<th>Brand</th><th>Model</th><th>Size</th>";
// echo "</thead>";
// echo "<tbody>";
foreach($selectBrand as $key => $row){
echo "".$row['name']." | <a href='update.php?bid=".$row['id']."'>Wijzig</a> | <a href='delete.php?bid=".$row['id']."'>Verwijder</a></br>";
    }
}

if(isset($_GET['models'])) {
$selectModel = $database->query("SELECT * from models")->fetchAll();

foreach($selectModel as $key => $row){
echo "".$row['name']." | <a href='update.php?mid=".$row['id']."'>Wijzig</a> | <a href='delete.php?mid=".$row['id']."'>Verwijder</a></br>";
    }
}

if(isset($_GET['sizes'])) {
$selectSize = $database->query("SELECT * from sizes")->fetchAll();
// echo "<form method=''";
foreach($selectSize as $key => $row){
echo "".$row['name']." | <a href='update.php?sid=".$row['id']."'>Wijzig</a> | <a href='delete.php?sid=".$row['id']."'>Verwijder</a></br>";
    }
}
// echo "</tr>";
// echo "</tbody>"; 
// echo "</table>";
?>