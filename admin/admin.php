<?php
    require '../includes/config/database.php';
    $db = conectarDB();
    
    $UserName = "Daarcy";
    $Email = "Correo@correo.com";
    $Password ="admin";
    $query = "INSERT INTO admin (`UserName`, `Email`, `Password`) VALUES ('$UserName', '$Email', '$Password')";

    //INSERT INTO `shell`.`about` (`Description`, `admin_idadmin`) VALUES ('asd', '2');
    //INSERT INTO about (Description, admin_idadmin) VALUES ('123456789123456789123456789123456789123456789123456', '1')
    //echo $query;
    $result = mysqli_query($db, $query);
    
    if($result){
        //redireeccionar
        header("Location:/admin/indexAdmin.php");
    }
?>