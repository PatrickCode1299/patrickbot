<?php
if(isset($_POST['edit_title'])){
$sitetitle=trim(htmlspecialchars($_POST['sitetitleparser']));
if(empty($sitetitle)){
	echo "<script>alert('Hey! Site Title Is Empty');</script>";
}else{
	require 'db.php';
	$sql="UPDATE configure SET firstconversation=?";
	$stmt=$conn->prepare($sql);
	$stmt->execute(array($sitetitle));
	echo "<script>alert('Opening Convo Updated');</script>";
}
}