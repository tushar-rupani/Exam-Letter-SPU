<?php
    $url='localhost';
    $username='root';
    $password='tushar2408';
    $conn=mysqli_connect($url,$username,$password,"exam");
    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }
   
?>