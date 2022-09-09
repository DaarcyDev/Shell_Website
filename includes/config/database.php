<?php
    //los : es para especificar que es lo que tiene que retornar
function conectarDB() : mysqli{
    $db = mysqli_connect('localhost','root','','shell');
    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}