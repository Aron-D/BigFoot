<?php 
    include "database.php"; 
    include_once "function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<input type="file" name="file" id="">

<input type="submit" value="upload">

<input type="submit" name="delete" id="" value="Delete all data">

</form>
</body>
</html>

<?php
print_r($_POST);
if(!empty($_POST['file'])){

upload($_POST['file']);


}

if(!empty($_POST['delete'])) {

clearAll();

}
?>