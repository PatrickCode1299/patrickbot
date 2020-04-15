<?php
$username="root";
$password="";
$dbname="patrickbot";
$conn=new PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>