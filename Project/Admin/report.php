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
	<link href="../css/print2.css" rel="stylesheet" media="print,screen">
    <!-- Page Specific CSS -->
	
	
	
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.jqprint.js"></script>
 <script>
            $(document).ready(function() {
                $('#printBtn').click(function(){
					$("#prntTbl").jqprint();
					return false;
				});
            });
        </script>
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
			  <li><a href="single-att.php"><i class="fa fa-check-square"></i>&nbsp; Check single Attendance</a></li>
             <li class="active"><a href="make-defaulter.php"><i class="fa fa-list"></i>&nbsp; Make Defaulter List</a></li>
             
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
<a class="btn btn-success" href="reportprint.php?service0=<?php echo $_POST['service'][0];?>&service1=<?php echo $_POST['service'][1];?>&service2=<?php echo $_POST['service'][2];?>&service3=<?php echo $_POST['service'][3];?>&criteria1=<?php echo $_POST['criteria'];?>">Print</a>

		

		
		<div class="box-content">
		<table class="table table-bordered" id="prntTbl">
		<tr>
		<th>Roll No.</th>
		<th>Student Name</th>
		<?php
		error_reporting(E_ALL ^ E_NOTICE);
		$sql = "SELECT * FROM  subjects WHERE id='".$_POST['service'][0]."' or id='".$_POST['service'][1]."' or id='".$_POST['service'][2]."' or id='".$_POST['service'][3]."'";
		//echo $sql;
		$data=mysql_query($sql);
		
		while($row=mysql_fetch_array($data)){
		echo '<th>'.$row['name'].'</th>';
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
				
$sql = "SELECT * FROM  subjects WHERE id='".$_POST['service'][0]."' or id='".$_POST['service'][1]."' or id='".$_POST['service'][2]."' or id='".$_POST['service'][3]."'";
//echo $sql;
$data=mysql_query($sql);

while($row=mysql_fetch_array($data)){
//echo '<td>'.$row['id'].'</td>';


				$sql3 = "SELECT * FROM ".DB_USERDB." WHERE subject_id='".$row['id']."' GROUP BY lect_start";
				//echo $sql;
				$data3=mysql_query($sql3);
				$total=0;
				$tot_lect=0;
				while($row3=mysql_fetch_array($data3)){
				
					$sql5 = "SELECT * FROM ".DB_USERDB." WHERE lect_start='{$row3['lect_start']}' AND start_roll_no <= '{$row2['rollnum']}' AND no_of_entries >= '{$row2['rollnum']}'  ";
					//echo $sql5;
					$tot_lect +=$row3['total_lect'];
					$data5 = mysql_query($sql5);
					$row5 = mysql_fetch_array($data5);
					//var_dump($row5);
					
					
					$sql4 = "SELECT * FROM ".DB_USERDB2." WHERE row_no = '{$row2['rollnum']}' AND rec_id='{$row5['rec_id']}'";
					$data4 = mysql_query($sql4);
					$row4 = mysql_fetch_array($data4);
					
				//echo '<td >'.$row4['total'].'</td>';
				
				
					$total += $row4['total'];
					
					//$percent=round(($total/$tot_lect)*100);
					
					
				
				}
		        $percent=round(($total/$tot_lect)*100);
				if($percent<$_POST['criteria']){
						$style = 'background:#4c4c4c;color:#ffffff;';
						$style2 = 'blackbox';
					}else{
						$style='';
						$style2 = '';
					}
				echo '<td class="'.style2.'" style="'.$style.'">'.$percent.'</td>';
		
				}
				
				echo '</tr>';
		
		} // end subject itr
			
			
			
			
		
		
		?>
		

		</table>

		</div>

      </div>

    </div>

      <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>

  </body>
</html>