<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Myapp</title>

        <!-- CSS -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>w3.css">
		<link rel="stylesheet" href="<?php echo CSS_PATH; ?>bootstrap.min.css">
       <style>
		body,h1 {font-family: "Raleway", sans-serif}
		body, html {height: 100%}
		.bgimg {
			background-image: url('<?php echo IMAGE_PATH; ?>/1.jpg');
			min-height: 100%;
			background-position: center;
			background-size: cover;
		}
		</style>
		
    </head>

    <body>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
    
  </div>
       
		<div class="container">
		  <div class="w3-display-middle w3-animate-opacity">
			<h2 class="w3-jumbo ">Myapp Login</h2>
			<hr class="w3-border-grey" style="margin:auto;width:40%">
			<br><br>
			<form class="w3-container" method="post">
			  <label>User Name</label>
			  <input class="w3-input w3-border w3-light-grey" type="text" id="name" placeholder="Username">

			  <label>Password</label>
			  <input class="w3-input w3-border w3-light-grey" type="password" id="pwd" placeholder="Password">
			  <br>
			  <input class="w3-btn w3-white w3-border w3-round-large" type="submit" value="Login" id="submit" >
			  <div id='result' style='display: none'>
				<div id='content_result'>
				<div id='result_show' class="w3-text-red">
				<div id='value'> </div></label>
				</div></div></div>
			</form>
		  </div>
		  <div class="w3-display-bottomleft w3-padding-large">
			Powered by <a href="http://simelabs.com/" target="_blank">simelabs</a>
		  </div>
		</div>
</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">

		// Ajax post
		$(document).ready(function(){
		$("#submit").click(function(){
		var user_name = $("#name").val();
		var password = $("#pwd").val();
		// Returns error message when submitted without req fields.
		if(user_name==''||password=='')
		{
		jQuery("div#result").show();
		jQuery("div#value").html("All fields are required");
		}
		else
		{
		// AJAX Code To Submit Form.
		$.ajax({
		type: "POST",
		url:  "<?php echo base_url(); ?>" + "login/check_login",
		data: {name: user_name, pwd: password},
		cache: false,
		success: function(result){
			if(result!=0){
				// On success redirect.
			window.location.replace(result);
			}
			else
				jQuery("div#result").show();
				jQuery("div#value").html("Login Failed");
		}
		});
		}
		return false;
		});
		});
		</script>		
    </body>

</html>
