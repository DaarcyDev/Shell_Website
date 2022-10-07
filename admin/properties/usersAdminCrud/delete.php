<?php
//*validar id 
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id){
    header('Location: /admin/indexAdmin.php');
}

require '../../../includes/config/database.php';
$db = conectarDB();

$query ="DELETE FROm register WHERE idregister = ${id}";
$result = mysqli_query($db, $query);  

if ($result) {
    //redireeccionar
    header("Location:/admin/properties/usersAdmin.php?resultado=3");
}
?>