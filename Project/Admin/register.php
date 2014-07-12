<html>
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
<div class="col-xs-3" style="margin:5em 35em;">
<form action="insert.php" method="post">
<fieldst>
<legend><img src="../img/form.png"/><b style="font-size:30px;"> &nbsp;&nbsp;&nbsp;Register</b></legend>

	<div class="row">
        <div>
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                <input type="text" class="form-control" placeholder="First Name" name="fname">
                <input type="text" class="form-control" placeholder="Last Name" name="lname">
            </div>
        </div>
        </div>
		
		<br/>
		<div class="row">
        <div>
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                <input type="text" class="form-control" placeholder="Your E-mail ID" name="email">
                
            </div>
        </div>
        </div>
		<br/>
<div class="row">
        <div>
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                <input type="text" class="form-control" placeholder="User Name" name="username">
              
            </div>
        </div>
        </div>
		<br/>
		<div class="row">
        <div>
            <div class="input-group">
			 <span class="input-group-addon"><span class="fa fa-key fa-fw"></span></span>
                <input type="password" class="form-control" placeholder="Pick a secure Password" name="password">
            </div>
        </div>
		</div>
	
		<br/>
		<div class="row">
		<div>
            <div class="input-group" style="display:block;">
              
			   <input type="submit" value="Register" class="btn btn-success col-md-6">

               <a href="login.php" class="btn btn-danger col-md-5 pull-right"><i>Cancel</i></a>
           </div>
        </div>
        </div>
    
	</fieldset>
</form>
</div>
</body>
</html>
