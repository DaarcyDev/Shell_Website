<?php

require 'app.php';

function incluirTemplate(string $nombre){
    //echo TEMPLATES_URL . "/${nombre}.php";
    include TEMPLATES_URL . "/${nombre}.php";
}