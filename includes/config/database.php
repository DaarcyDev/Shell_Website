<?php
    //los : es para especificar que es lo que tiene que retornar
function conectarDB() : mysqli{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $db = mysqli_connect('127.0.0.1', 'root', '','shell');

    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}
conectarDB();