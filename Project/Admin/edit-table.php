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
  <script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/jquery.jeditable.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">

$(function() {
        
  $(".editable_select").editable("save_tbl.php", { 
    indicator : '<img src="../img/indicator.gif">',
    type   : "text",
    style  : "inherit",
    submitdata : function() {
		var id = $(this).attr('id');
      return {id : id};
    }
  });
 
});
</script>
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
             <li class="active"><a href="edit-att.php"><i class="fa fa-edit"></i>&nbsp;Edit Attendance</a></li>
			 <li><a href="view-att.php"><i class="fa fa-eye"></i>&nbsp;view Attendance</a></li>           
			 <li><a href="single-att.php"><i class="fa fa-list"></i>&nbsp; Check single Attendance</a></li>
             <li><a href="make-defaulter.php"><i class="fa fa-list"></i>&nbsp; Make Defaulter List</a></li>
             
          </ul>

         <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?> <b class="caret"></b></a>
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
              <li><a href="profile.php"><i class="icon-dashboard"></i> Dashboard</a></li>              <li class="active"><i class="icon-file-alt"></i> Edit Attendance</li>
            </ol>
          </div>
        </div>
		<div class="box-content">
		<table class="table table-bordered">
		<tr>
		<th>Roll No.</th>
		<th>Student Name</th>
		<?php
		$sql = "SELECT * FROM ".DB_USERDB." WHERE subject_id='".$_POST['subject_id']."' GROUP BY lect_start";
		//echo $sql;
		$data=mysql_query($sql);
		$tot_lect=0;
		while($row=mysql_fetch_array($data)){
		echo '<th>L'.$row['lect_start'].'-L'.($row['lect_start']+$row['total_lect']-1).'</th>';
		$tot_lect += $row['total_lect'];
		}
		
		?>
		
		
		</tr>
		
		
		<?php
		$sql2 = "SELECT * FROM ".DB_USERDB1;
		
		$data2=mysql_query($sql2);
		
		while($row2=mysql_fetch_array($data2)){
		echo '<tr>';
		echo '<td>'.$row2['rollnum'].'</td>
		<td>'.$row2['stud_name'].'</td>';
		/////////////////////////
		
		
		$sql3 = "SELECT * FROM ".DB_USERDB." WHERE subject_id='".$_POST['subject_id']."' GROUP BY lect_start";
		//echo $sql;
		$data3=mysql_query($sql3);
		$total=0;
		while($row3=mysql_fetch_array($data3)){
		
			$sql5 = "SELECT * FROM ".DB_USERDB." WHERE lect_start='{$row3['lect_start']}' AND start_roll_no <= '{$row2['rollnum']}' AND no_of_entries >= '{$row2['rollnum']}'  ";
			//echo $sql5;
			$data5 = mysql_query($sql5);
			$row5 = mysql_fetch_array($data5);
			//var_dump($row5);
			
			
			$sql4 = "SELECT * FROM ".DB_USERDB2." WHERE row_no = '{$row2['rollnum']}' AND rec_id='{$row5['rec_id']}'";
			$data4 = mysql_query($sql4);
			$row4 = mysql_fetch_array($data4);
			
		echo '<td  id="'.$row4['id'].'" class="editable_select">'.$row4['total'].'</td>';
		
		
		
		}
		
		
		
		
		
		
		/////////////////////////////
		echo '</tr>';
		
		}
		
		?>

		</table>

		</div>

      </div>

    </div>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>