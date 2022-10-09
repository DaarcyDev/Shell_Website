<?php
    require '../includes/config/database.php';
    $db = conectarDB();
    
    $UserName = "Daarcy";
    $Email = "Correo@correo.com";
    $Password ="admin";
    $PasswordHash =  password_hash($Password, PASSWORD_DEFAULT);

    //var_dump($PasswordHash);

    $query = "INSERT INTO admin (`UserName`, `Email`, `Password`) VALUES ('$UserName', '$Email', '$PasswordHash  ')";

    echo $query; 
    
    $result = mysqli_query($db, $query);
    
    if($result){
        //redireeccionar
        header("Location:/admin/indexAdmin.php");
    }
?>