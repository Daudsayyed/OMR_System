<?php 
include_once('config.php');
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: login.php');
}
//var_dump($_FILES);

$last=$_POST['start_roll_no'];
//var_dump($last);
/// Connect
//$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);

//mysql_select_db(DB_DATABASE) or die( "Unable to select database");


//query
$query = "INSERT INTO ".DB_USERDB."(staff_id,subject_id,lect_start,total_lect,sheet_no,start_roll_no,no_of_entries) 
                                 VALUES ('".$_POST['staff_id']."','".$_POST['subject_id']."','".$_POST['lect_start']."','".$_POST['total_lect']."','".$_POST['sheet_no']."','".$_POST['start_roll_no']."','".$_POST['no_of_entries']."')";

$data = mysql_query($query);

$id=mysql_insert_id();

$filename = $id;

//var_dump($_FILES);
$allowedExts = array("gif", "jpeg", "jpg","tif", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/tiff")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 1000000000000000000000000000000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
   // echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
   // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("C:/xampp/htdocs/omrnewcmd/data/" . $filename.".".$extension))
      {
      //echo $filename.".".$extension . " already exists. ";
      }
    else
      {
	  if(move_uploaded_file($_FILES["file"]["tmp_name"],
      "C:/xampp/htdocs/omrnewcmd/data/" . $filename.".".$extension)){
      
	  
	  $query1="UPDATE ".DB_USERDB."
				SET image='$filename.$extension'
				WHERE rec_id=$filename";
				$data1 = mysql_query($query1);
	  
	  }
	  
     // echo "Stored in: " . "C:/xampp/htdocs/omrnewcmd/data/" . $filename.".".$extension;
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  

  
  if(exec('cd C:\xampp\htdocs\omrnewcmd && java -jar omrproj.jar data/'.$filename.".".$extension.' '.$id.' '.$last, $retval)){
		 $_SESSION['done']="Successfully Inserted";
		 header('Location: add-att.php');

  }else{
		$_SESSION['error']="Oops! Error Occurred";
		header('Location: add-att.php');
  }
?>