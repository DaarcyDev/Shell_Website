<?php
//*validar id 
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id){
    header('Location: /admin/indexAdmin.php');
}

require '../../../includes/config/database.php';
$db = conectarDB();

$query = "SELECT Image FROM discography WHERE iddiscography = ${id}";
$result = mysqli_query($db, $query);
$property = mysqli_fetch_assoc($result);
$imageFolder = '../../../images/';
unlink($imageFolder. $property["Image"]); 

$query ="DELETE FROm discography WHERE iddiscography = ${id}";
$result = mysqli_query($db, $query);  

if ($result) {
    //redireeccionar
    header("Location:/admin/properties/discAdmin.php?resultado=3");
}
?>