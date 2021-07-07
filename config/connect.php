<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
    $host = "localhost";
    $username = "root";
    $password = "Re89on2#23_iti22ria*99";
    $db = "itilria";
    //$host = "localhost:3306";
    //$password = "itilria#8kk0";
    //$username = "itilrtzg_itilria";
    //$db = "itilrtzg_itilria";

    $mysql = new mysqli($host, $username, $password, $db);

    if($mysql->errno){
        echo "problem occured could not connect " .$mysql->error;
        exit();
    }
?>