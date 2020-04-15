<?php
$gethumanresponse=trim(strip_tags(ucfirst($_POST['message'])));
$uid=$_COOKIE['messagebotid'];
if(isset($_POST['send'])){
if(empty($_POST['message'])){
	echo "";
}else{
require 'db.php';
    $day=date('Y-m-d H:i:s');
	$sql="INSERT INTO messagebot(userid,message,day) VALUES(?,?,?)";
	$stmt=$conn->prepare($sql);
	$stmt->execute(array($uid,$gethumanresponse,$day));
$checknewmessage=$_COOKIE['messagebotid'];
$sql="SELECT * FROM messagebot WHERE userid=? ORDER BY id desc LIMIT 1";
$stmt=$conn->prepare($sql);
$stmt->execute(array($checknewmessage));
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	echo "<div class='clearfix'>
	<div class='pull-right getbgsecond'>
	<p>".$row['message']."</p>
	</div>
	</div>";
}
}





}
switch ($gethumanresponse) {
	case 'Hello':
		echo "<div class='clearfix'>
		<div class='pull-left getbg'><p>How are you friend,</p><p>how has your day been and what can i help you with.</p></div>
		</div>";
		break;
	case 'What\'s up':
		echo "<div class='clearfix'>
		<div class='pull-left getbg'><p>How are you friend,</p><p>how has your day been and what can i help you with.</p></div>
		</div>";
		break;
	case 'Hi':
		echo "<div class='clearfix'>
		<div class='pull-left getbg'>Hi there friend how are you doing today</div></div>";
		break;
	case 'Am fine and you':
	echo "<div class='clearfix'>
		<div class='pull-left getbg'><p>I am doing great also how can i be of help..</p></div></div>";
		break;
	case 'Am fine and you.':
		echo "<div class='clearfix'>
		<div class='pull-left getbg'><p>I am doing great also how can i be of help..</p></div></div>";
		break;
	case 'Who are you':
		echo "<div class='clearfix'>
		<div class='pull-left getbg'><p>Hi there friend i am patrick,</p><p>a computer software developer and web artisan lol how can i help you....</p></div></div>";
		break;
	case 'Am good and you':
		echo "<div class='clearfix'>
		<div class='pull-left getbg'><p>I am doing great also how can i be of help..</p></div></div>";
		break;
		case 'I am fine and You':
			echo "<div class='clearfix'>
		<div class='pull-left getbg'><p>I am fine also how can i be of help</p></div></div>";
			break;
	case 'Fuck you':
		echo "<div class='clearfix'>
		<div class='pull-left getbg'>What you mean?</div></div>";
		break;
	case 'Who are you?':
		echo "<div class='clearfix'>
		<div class='pull-left getbg'><p>Hi there friend i am patrick,</p><p> a computer software developer and web artisan lol how can i help you....</p></div></div>";
		break;
	case 'What is your name?':
		echo "<div class='clearfix'>
		<div class='pull-left getbg'><p>My name is Patrick.</p></div></div>";
		break;
	case 'What is your name':
		echo "<div class='clearfix'><div class='pull-left getbg'><p>My name is Patrick.</p></div></div>";
		break;
	case 'Shut up':
	   echo "<div class='clearfix'>
		<div class='pull-left getbg'>Humm ok, i ain't talking till you reply me again.</div></div>";
		break;
	case 'How can i contact you':
	    echo "<div class='clearfix'>
		<div class='pull-left getbg'>Take a Plane From Where you are and Visit Copenhagen Denmark,Europe..</div></div>";
		break;
	case 'Ok':
		echo "<div class='clearfix'><div class='pull-left getbg'><p>Thanks for the love Buddy..</p></div></div>";
		break;
	case 'Am doing good and you':
		echo "<div class='clearfix'><div class='pull-left getbg'><p>Am great pal how can i help you..</p></div></div>";
		break;
		case 'Am doing good and you.':
		echo "<div class='clearfix'><div class='pull-left getbg'><p>Am great pal how can i help you..</p></div></div>";
		break;
	case 'I want a website':
		echo "<div class='clearfix'><div class='pull-left getbg'><p>What type of website did you want sir/ma,for example e-commerce,school website or business website.</p></div></div>";
		break;
	case 'I need a website':
		echo "<div class='clearfix'><div class='pull-left getbg'><p>What type of website did you want sir/ma,for example e-commerce,school website or business website.</p></div></div>";
		break;
	case 'E-commerce':
		echo "<div class='clearfix'><div class='pull-left getbg'><p>We can develop it for 125,000 Naira only if you are interested let's continue this conversation on phone or email...... +2350084884 that is whatsapp my number....</p></div></div>";
		break;
	case 'School website':
		echo "<div class='clearfix'><div class='pull-left getbg'><p>We can develop it for 225,000 Naira only if you are interested let's continue this conversation on phone or email...... +2350084884 that is whatsapp my number....</p></div></div>";
		break;
	case 'Business website':
		echo "<div class='clearfix'><div class='pull-left getbg'><p>We can develop it for 225,000 Naira only if you are interested let's continue this conversation on phone or email...... +2350084884 that is whatsapp my number....</p></div></div>";
		break;
	case '':
		echo "";
		break;
	default:
		echo "<div class='clearfix'>
		<div class='pull-left getbg'>Could not understand your message, trying asking me a question</div></div>";
		break;
}