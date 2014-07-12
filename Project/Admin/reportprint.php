<?php 
include_once('config.php');
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: login.php');
}
?>
<html>
<head><title>Print Page</title>

</head>

<body>

<div class="box-content">

		<table class="table table-bordered" border=1 id="prntTbl" cellspacing=0 cellpadding=0>
		<tr>
		<th>Roll No.</th>
		<th>Student Name</th>
		<?php
		error_reporting(E_ALL ^ E_NOTICE);
		$sql = "SELECT * FROM  subjects WHERE id='".$_GET['service0']."' or id='".$_GET['service1']."' or id='".$_GET['service2']."' or id='".$_GET['service3']."'";
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
				
$sql = "SELECT * FROM  subjects WHERE id='".$_GET['service0']."' or id='".$_GET['service1']."' or id='".$_GET['service2']."' or id='".$_GET['service3']."'";
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
				if($percent<$_GET['criteria1']){
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
	</body>
	</html>