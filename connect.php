<?php
    $conn = pg_connect("postgres://iaztscbnlkbitn:ab86d20b438de6461bf48d4f02c4d6f74ca8ae23c8f02942a9a119d55b7d6289@ec2-3-218-92-146.compute-1.amazonaws.com:5432/dcb61mlp7vkekk");

    if(!$conn){
        die("Can not connect database");
    } 
?>