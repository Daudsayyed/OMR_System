<?php
include_once('config.php');
// Check, if username session is NOT set then this page will jump to login page
if (isset($_SESSION['username'])) {
        header('Location: profile.php');
		
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<style>
	</style>
</head>
<body>
<div class="col-xs-3" style="margin:10em 35em;">
<form action="logproc.php" method="post">
<fieldset>
<legend><img src="../img/icon-login.png"/><b style="font-size:30px;">Login...</b></legend>
    <div class="row">
        <div>
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                <input type="text" name="username" class="form-control" placeholder="User Name">
            </div>
        </div>
        </div>
		<br/>
		<div class="row">
        <div>
            <div class="input-group">
			 <span class="input-group-addon"><span class="fa fa-key fa-fw"></span></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
		</div>
		<br/>
		<div class="row">
		<div>
            <div class="input-group" style="display:block;">
              
			   <input type="submit" name="submit" class="btn btn-success col-md-6">

               <a href="register.php" class="btn btn-info col-md-5 pull-right"><i>Register</i></a>
           </div>
        </div>
    </div>
	</fieldset>
</form>
</div>
</body>
</html>                                		