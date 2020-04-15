<?php
if(isset($_POST['controlcolor'])){
$newbgcolor=trim(htmlspecialchars($_POST['color']));
require 'db.php';
$sql="UPDATE configure SET background=?";
$stmt=$conn->prepare($sql);
$stmt->execute(array($newbgcolor));
echo "<script>alert('Color Updated');</script>";

}