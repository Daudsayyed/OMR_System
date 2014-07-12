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
			 <li><a href="add-att.php"><i class="fa fa-plus-square"></i>&nbsp;Add Attendance</a></li>
             <li><a href="edit-att.php"><i class="fa fa-edit"></i>&nbsp;Edit Attendance</a></li>
			 <li><a href="view-att.php"><i class="fa fa-eye"></i>&nbsp;view Attendance</a></li>            
             <li class="active"><a href="single-att.php"><i class="fa fa-check-square"></i>&nbsp; Check single Attendance</a></li>
             <li><a href="make-defaulter.php"><i class="fa fa-list"></i>&nbsp; Make Defaulter List</a></li>
             
          </ul>

         <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?> <b class="caret"></b></a>              <ul class="dropdown-menu">
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
			  <li class="active"><i class="icon-file-alt"></i> View Attendance</li>
            </ol>
          </div>
        </div>
		<div class="box-content"  style="width:40%;height:150px;margin:100px auto;">
		<table border=0>
		<tr>
		<td>Student Name &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td>
		<?php
			$query1="select * from students where rollnum='".$_POST['rollno']."' ";
			//echo $query;
			$data1= mysql_query($query1);
			while($row1=mysql_fetch_array($data1)){
			echo $row1['stud_name'];
			}
		?></td>
		</tr>
			<tr>
		<td>Roll Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td>
		<?php
			echo $_POST['rollno'];	
		?></td>
		</tr>
		</tr>
		<tr>
		<td>Subject Name &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td>
		<?php
			$query2="select * from subjects where id='".$_POST['subject_id']."' ";
			//echo $query;
			$data2= mysql_query($query2);
			while($row2=mysql_fetch_array($data2)){
			echo $row2['name'];
			}
		?></td>
		</tr>
		<tr>
		
		<?php
			$sql = "SELECT * FROM ".DB_USERDB." WHERE subject_id='".$_POST['subject_id']."' GROUP BY lect_start";
		//echo $sql;
		$data3=mysql_query($sql);
		$tot_lect=0;
		$total=0;
		while($row3=mysql_fetch_array($data3)){
		echo '<td>Lect'.$row3['lect_start'].'-Lect'.($row3['lect_start']+$row3['total_lect']-1).' &nbsp;&nbsp;&nbsp;:</td>';
		$tot_lect += $row3['total_lect'];
		
			$sql5 = "SELECT * FROM ".DB_USERDB." WHERE lect_start='{$row3['lect_start']}' AND start_roll_no <= '".$_POST['rollno']."' AND no_of_entries >= '".$_POST['rollno']."'  ";
			//echo $sql5;
			$data5 = mysql_query($sql5);
			$row5 = mysql_fetch_array($data5);
			//var_dump($row5);
			
			$sql6 = "SELECT * FROM ".DB_USERDB2." WHERE row_no = '".$_POST['rollno']."' AND rec_id='{$row5['rec_id']}'";
			$data6 = mysql_query($sql6);
			$row6 = mysql_fetch_array($data6);
			
		echo '<td >'.$row6['total'].'</td>';
		echo '</tr>';
		}
		?>
		<tr>
		<td>
		Total Attendance:
		</td>
		
		<?php 
		
		$sql7 = "SELECT * FROM ".DB_USERDB." WHERE subject_id='".$_POST['subject_id']."' GROUP BY lect_start";
		//echo $sql;
		$data7=mysql_query($sql7);
		$tot_lect=0;
		$total=0;
		while($row7=mysql_fetch_array($data7)){
		//echo '<td>Lect'.$row3['lect_start'].'-Lect'.($row3['lect_start']+$row3['total_lect']-1).' :</td>';
		$tot_lect += $row7['total_lect'];
		
			$sql8 = "SELECT * FROM ".DB_USERDB." WHERE lect_start='{$row3['lect_start']}' AND start_roll_no <= '".$_POST['rollno']."' AND no_of_entries >= '".$_POST['rollno']."'  ";
			//echo $sql5;
			$data8 = mysql_query($sql8);
			$row8 = mysql_fetch_array($data8);
			//var_dump($row5);
			
			$sql9 = "SELECT * FROM ".DB_USERDB2." WHERE row_no = '".$_POST['rollno']."' AND rec_id='{$row5['rec_id']}'";
			$data9 = mysql_query($sql9);
			$row9 = mysql_fetch_array($data9);
			$total += $row9['total'];
			
		}
		echo '<td>'.$total.'</td>';
		?>
		</tr>
		
		</table>
		<b>Do you want to see new student attendance</b>&nbsp;<a href="single-att.php" class="btn btn-success"><b class="fa fa-plus">&nbsp;New one</b></a>
		</div>

      </div>

    </div>
	
   <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>

  </body>
</html>