<?php

require 'app.php';

function incluirTemplate(string $nombre){
    //echo TEMPLATES_URL . "/${nombre}.php";
    include TEMPLATES_URL . "/${nombre}.php";
}
function autenticate () : bool{
    session_start();
    //var_dump($_SESSION);

    $auth= $_SESSION['login'];
    if($auth){
       return true; 
    }
    return false;
    
}