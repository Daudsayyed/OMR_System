<?php 
include_once('config.php');
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: login.php');
}
?><!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard -Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="profile.php">Admin Panel</a>
        </div>

       <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
         <ul class="nav navbar-nav side-nav">
           
			 <li><a href="profile.php"><i class="fa fa-picture-o"></i>&nbsp;Profile</a></li>
			 <li class="active"><a href="add-att.php"><i class="fa fa-plus-square"></i>&nbsp;Add Attendance</a></li>
             <li><a href="edit-att.php"><i class="fa fa-edit"></i>&nbsp;Edit Attendance</a></li>
			 <li><a href="view-att.php"><i class="fa fa-eye"></i>&nbsp;view Attendance</a></li>
              <li><a href="single-att.php"><i class="fa fa-check-square"></i>&nbsp;Check single Attendance</a></li>
             <li><a href="make-defaulter.php"><i class="fa fa-list"></i>&nbsp; Make Defaulter List</a></li>
             
          </ul>

         <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?> <b class="caret"></b></a>          
			  <ul class="dropdown-menu">
                 <li><a href="logout.php"><i class="fa fa-power-off"></i>Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
           
            <ol class="breadcrumb">
              <li><a href="profile.php"><i class="icon-dashboard"></i> Dashboard</a></li>              
			  <li class="active"><i class="icon-file-alt"></i> Add Attendance</li>
            </ol>
          </div>
        </div>
		<div class="col-sm-14"  style="margin:0em 25em;">
		
		<?php
			if(isset($_SESSION['done'])){
				echo $_SESSION['done'];
				unset($_SESSION['done']);
			}
		
		?>
		
		<?php
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
		
		?>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<div class="row">
	 <div class="form-group col-sm-6">
		<label class="control-label">Staff_Name</label>
		<select class="form-control" name="staff_id">
		 <option>Select Staff_Name</option>
	  <option value=1 >Shiburaj Pappu</option>
	  <option value=2>Ketan kanare</option>
	  <option value=3>Ashfaque Shaikh</option>
	  <option value=4>Mandar Naik</option>
	  <option value=5>Jacob Sir</option>
		</select>
  </div>
  <div class="form-group col-sm-6">
		<label class="control-label">Subject_Name</label>
		<select class="form-control" name="subject_id">
		 <option>Select Subject_Name</option>
	  <option value=1>Adavanced Internet Technology</option>
	  <option value=2>Multimedia System Design</option>
	  <option value=3>Software Architecture</option>
	  <option value=4>Distributed Computing</option>
	  <option value=5>Algebra</option>
		</select>
  </div>
    <div class="form-group col-sm-6">
		<label class="control-label">Start Lecture</label>
		<input type="text" class="form-control" name="lect_start">
  </div>
   <div class="form-group col-sm-6">
		<label class="control-label">Total Lectures</label>
		<input type="text" class="form-control" name="total_lect">
  </div>
  <div class="form-group col-sm-11">
		<label class="control-label">Sheet_No</label>
		<select class="form-control" name="sheet_no">
		 <option>Select Sheet_No</option>
	  <option>1</option>
	  <option>2</option>
	  <option>3</option>
	  <option>4</option>
		</select>
  </div>
  <div class="form-group col-sm-6">
		<label class="control-label">Start Roll_No</label>
		<input type="text" class="form-control" name="start_roll_no">
  </div>
  <div class="form-group col-sm-6">
		<label class="control-label">Last Roll_No</label>
		<input type="text" class="form-control" name="no_of_entries">
  </div>
  <div class="form-group col-sm-6">
<div class="fileupload fileupload-new" data-provides="fileupload">
<input type="file" name="file" id="file">
</div>
</div>
  </div>
  <br/>
  <input type="submit" name="submit" class="btn btn-success col-sm-6" style="margin-left:-2%;" Value="Submit"/>
  <a href="#" class="btn btn-danger col-sm-4" style="margin-left:10%;">Cancel</a>

	
		</form>
	</div>
	</div>
      </div>

    </div>

      <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>

  </body>
</html>