<?php 
include_once('config.php');
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: login.php');
}
?>
<!DOCTYPE html>
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
	<style>
	h3,i{display:inline;}
	</style>
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
           
			 <li class="active"><a href="profile.php"><i class="fa fa-picture-o"></i>&nbsp;Profile</a></li>
			 <li><a href="add-att.php"><i class="fa fa-plus-square"></i>&nbsp;Add Attendance</a></li>
             <li><a href="edit-att.php"><i class="fa fa-edit"></i>&nbsp;Edit Attendance</a></li>
			 <li><a href="view-att.php"><i class="fa fa-eye"></i>&nbsp;view Attendance</a></li>            
              <li><a href="single-att.php"><i class="fa fa-check-square"></i>&nbsp; Check single Attendance</a></li>
             <li><a href="make-defaulter.php"><i class="fa fa-list"></i>&nbsp; Make Defaulter List</a></li>
             
          </ul>

           <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['username']; ?> <b class="caret"></b></a>            
			  <ul class="dropdown-menu">
                 <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
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
			  <li class="active"><i class="icon-file-alt"></i> Profile</li>
            </ol>
          </div>
        </div>
		<table border="0" style="margin:0em 20em;width:60%;">
		<tr>
		<td><img width="100"  height="100" src="../img/<?php 
		
		$query7="Select * from profile where user='".$_SESSION['username']."'";
	   	$data7=mysql_query($query7);	
		while($row7=mysql_fetch_array($data7)){
		echo $row7['img'];}
		
		?>"/></td>
		<td><?php
		//<div style=></div>
		
		$query2="select * from user where username='".$_SESSION['username']."'";
	
		$data2=mysql_query($query2);
			while($row2=mysql_fetch_array($data2)){
		echo "<h3>Welcome,".$row2['fname']." ".$row2['lname']."-</h3><i>Administrator</i><br/>";
		
		$query="Select * from profile where user='".$_SESSION['username']."'";
		
		//echo $query;
		$data=mysql_query($query);
		while($row=mysql_fetch_array($data)){
		echo $row['about'];
		}
		
		}
		
		?></td>
		</tr>
		<tr>
		<td></td>
		<td><hr class="alert-info hr"/></td>
		</tr>
		<tr>
		<td></td>
		<td><b>Personal Information</b><br/>
		<?php
		
		$query3="select * from user where username='".$_SESSION['username']."'";
	
		$data3=mysql_query($query3);
			while($row3=mysql_fetch_array($data3)){
		$query4="Select * from profile where user='".$_SESSION['username']."'";
		
		//echo $query;
		$data4=mysql_query($query4);
		while($row4=mysql_fetch_array($data4)){
		echo '<img width="20" height="20" src="../img/download.jpg"/>&nbsp;'.$row4['gender']."&nbsp;<b>-</b>&nbsp;".$row4['age']."&nbsp;yrs<br/>";
		echo '<b class="fa fa-map-marker"></b>&nbsp;'.$row4['address']."<br/>";
		echo '<b class="fa fa-inbox"></b>&nbsp;'.$row3['email']."<br/>";
		echo '<b class="fa fa-mobile"></b>&nbsp;'.$row4['phone']."<br/>";
		}
		}
		
		?>
		
		</td>
		</tr>
		</tr>
		<tr>
		<td></td>
		<td><hr class="alert-info hr"/></td>
		</tr>
		<tr>
		<td></td>
		<td><b>Qualification </b><br/>
		<?php
		
	
		$query6="Select * from profile where user='".$_SESSION['username']."'";
		
		//echo $query;
		$data6=mysql_query($query6);
		while($row6=mysql_fetch_array($data6)){
		echo "<b>S.S.C </b>&nbsp;".$row6['10th']."<br/>";
		echo '<b>H.S.C </b>&nbsp;'.$row6['12th']."<br/>";
		echo '<b>B.E </b>&nbsp;&nbsp;&nbsp;&nbsp;'.$row6['b.e']."<br/>";
		}
		
		
		?>
		<tr>
		<td></td>
		<td><hr class="alert-info hr"/></td>
		</tr>
		</td>
		</tr>
		<tr>
		<td></td>
		<td><b>Talent </b><br/>
		<?php
		
	
		$query5="Select * from profile where user='".$_SESSION['username']."'";
		
		//echo $query;
		$data5=mysql_query($query5);
		while($row5=mysql_fetch_array($data5)){
		echo "<b>Skills 1 :-</b>&nbsp;".$row5['skill1']."<br/>";
		echo '<b>Skills 2 :-</b>&nbsp;'.$row5['skill2']."<br/>";
		echo '<b>Skills 3 :-</b>&nbsp;'.$row5['skill3']."<br/>";
		}
		
		
		?>
		
		</td>
		</tr>
		<tr>
		<td></td>
		<td><hr class="alert-info hr"/></td>
		</tr>
		</table>
		

      </div>
      </div>

    </div>

    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>

  </body>
</html>