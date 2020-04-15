<?php
include_once 'db.php';
$value=uniqid('',true);
setcookie("messagebotid",$value,time()+(86400 * 180),'/');



?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="description" content="The Biggest Promotion site for Small and Large Scale Business Owners">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<link rel="icon" type="fav/ico" href="">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
		<?php
   $sql="SELECT background FROM configure";
    $result=$conn->query($sql);
    if($row=$result->fetch()){
    	if($row['background']=='green'){
    		echo "<link rel='stylesheet' type='text/css' href='green.css'>";
    	}elseif ($row['background']=='blue') {
    		echo "<link rel='stylesheet' type='text/css' href='blue.css'>";
    	}elseif ($row['background']=='cyan') {
    		echo "<link rel='stylesheet' type='text/css' href='cyan.css'>"; 
    	}
    	else{
    		echo "<link rel='stylesheet' type='text/css' href='home.css'>"; 	
    	}
    }else{
    	echo "<link rel='stylesheet' type='text/css' href='home.css'>";
    }
	?>
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.css">
	<?php
    $sql="SELECT title FROM configure";
    $result=$conn->query($sql);
    if($row=$result->fetch()){
    	echo "<title>".$row['title']."</title>";
    }else{
    	echo "<title>Mr Patrick</title>";
    }
	?>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="border-radius:0px;" role="navigation">
		<div class="navbar-header">
			<?php
    $sql="SELECT title FROM configure";
    $result=$conn->query($sql);
    if($row=$result->fetch()){
    	echo "<a class='navbar-brand' id='sitename' href='#' style='font-weight:bold;'>".$row['title']."</a>";
    }else{
    	echo "<a class='navbar-brand' id='sitename' href='#' style='font-weight:bold;'>PATRICKBOT</a>";
    }
	?>
	</div>
	</nav>
	<
<div class="container-fluid" id="message-holder">
<button type="button" id="unpopbutton" class="btn btn-primary  pull-right custom-btn" >
Edit
</button>
<div class="clearfix">
<div class="panel pull-right panel-default configure-holder" id="pop">
	<div class="panel-heading">
	<h3 class="panel-title">Configure Me</h3>
	</div>
	<div class="panel-body configuretip">
	 <a  data-toggle="collapse" data-parent="#accordion" href="#titleholder">Change Bot Title</a>
	</div>
	<div class="panel-collapse  collapse" id="titleholder">
	<div class="panel-body">
		<form class="titleform" action="updatettl.php" method="POST">
		<textarea name="sitetitleparser" class="titletext" onkeyup="rewrite()" placeholder="edit bot name here">

		</textarea>
		<button type="submit" name="edit_title" class="btn btn-success">Submit</button>
	</form>
	</div>
</div>
	<div class="panel-body configuretip">
		<a data-toggle="collapse" data-parent="#accordion" href="#chatbackground">Change Background Colour</a>
	</div>
	<div class="panel-collapse  collapse" id="chatbackground">
	<div class="panel-body">
		<div class="btn-group">
			<form class="titleform inline-form" method="POST" action="changebg.php">
			<input type="hidden" value="green" name="color">
			<button type="submit" name="controlcolor" class="btn btn-success">Green</button>
		    </form>
			<form class="titleform inline-form"  method="POST" action="changebg.php">
			<input type="hidden" value="blue" name="color">
			<button type='submit' name="controlcolor" type="button" class="btn btn-primary">Blue</button>
		    </form>
			<form  class="titleform inline-form" method="POST" action="changebg.php">
			<input type="hidden" value="cyan" name="color">
			<button type="submit" name="controlcolor" class="btn btn-info">Cyan</button>
			</form>
			<form  class="titleform inline-form" method="POST" action="changebg.php">
			<input type="hidden" value="default" name="color">
			<button type="submit" name="controlcolor" style="background:black; border:1px solid black;" class="btn btn-primary">Default</button>
			</form>
		</div>
	</div>
</div>
	<div class="panel-body configuretip">
		<span>Change Bot Response</span>
	</div>
	<div class="panel-body configuretip">
		<a data-toggle="collapse" data-parent="#accordion" href="#converse">Change Opening Conversation</a>
	</div>
	<div class="panel-collapse  collapse" id="converse">
	<div class="panel-body">
		<form class="titleform" action="update_convo.php" method="POST">
		<textarea name="sitetitleparser" style="resize:none; width:95%; box-sizing:border-box; border-radius:10px;" class="conversetext" onkeyup="changeconverse()" placeholder="edit opening conversation here">

		</textarea>
		<button type="submit" name="edit_title" class="btn btn-success">Submit</button>
	</form>
	</div>
</div>
</div>
</div>
<?php
    $sql="SELECT firstconversation FROM configure";
    $result=$conn->query($sql);
    if($row=$result->fetch()){
    	echo "<div class='clearfix'>
    	<div class='pull-left getbg'>
    	".$row['firstconversation']."
    	</div>
    	</div>";
    }else{
    	echo "<div class='clearfix'>
	<div class='pull-left getbg' id='firstconverse'>
		<p>Hello, i'm Patrick </p>
		<p>Send me a message now and lets talk....</p>
	</div>
</div>
";
    }
	?>


</div>
<div class="navbar navbar-fixed-bottom">
<form  role='form' class="ajax" method="POST" action="chat.php">
<div style="position:relative;">
<button style="position:absolute; right:10px;" type="submit" class="chat-btn pull-right"><i class="fa fa-paper-plane" name="send" style="font-size:25px;"></i></button>
<textarea placeholder="Type a message...." name="message" rows="2" class="form-control input-md unresizable"></textarea>
</div>
</form>
</div>
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<!--<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="js/chatajax.js"></script>
<!--<script type="text/javascript" src="js/ajaxform.js"></script> -->
<script type="text/javascript">
	function rewrite(){
		var textholder=$(".titletext").val();
		var realinfo=$("#sitename").text();
		if(realinfo==""){
        $("#sitename").html("PATRICKBOT");
		}else{
			var getsitenameval=$("#sitename").text(textholder);
		}
		
	}
	function changeconverse(){
		var textholder=$(".conversetext").val();
		var realinfo=$("#firstconverse").text();
		if(realinfo==""){
        $("#firstconverse").html("Hello, i'm Patrick Send me a message now and lets talk....");
		}else{
			var getsitenameval=$("#firstconverse").text(textholder);
		}
	}
	$(".custom-btn").click(function(){
		$("#pop").show();
	});
</script>
<script>
$(document).mouseup(function(e){
    var container = $("#pop");

    // If the target of the click isn't the container
    if(!container.is(e.target) && container.has(e.target).length === 0){
        container.hide();
    }
});
</script>
<script type="text/javascript">
	$('form.titleform').on('submit' ,function(e){
var that= $(this),
url= that.attr('action'),
type=that.attr('method'),
data={};
that.find('[name]').each(function(index, value){
  var that = $(this),
    name=that.attr('name'),
    value=that.val();
    data[name]=value;

});
e.stopImmediatePropagation();
$.ajax({
  url:url,
  type:type,
  data:data,
  success:function(response){
    $("body").append(response);
    $("titletext").val("");
  }
});

return false;
});

</script>
</body>
</html> 