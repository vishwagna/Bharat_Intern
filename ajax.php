<?php
$servername = "localhost:3306";
$username = "root";
$password = "Sweety@1";
$dbname = "intern";
$conn = new mysqli($servername, $username, $password,$dbname);

 session_start();
$name=$_SESSION['username'];

$sql="SELECT * from user_details where name='$name'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['user_id'];
if(isset($_POST["submit"])){
    $txt=trim($_POST["text"]);
    $stmt = $conn->prepare("INSERT INTO uploads(acc_no,file)VALUES(?,?)");
	$stmt->bind_param("is",$id,$txt);
	$stmt->execute();
	echo "Uploaded successfully";
	$stmt->close();
	$conn->close();
}
else{
if(!file_exists('upload')){
    mkdir("upload",0777);
}
$filename=time().'_'.$_FILES['file']['name'];
$folder='upload/'.$filename;
if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$filename)) {
   
 
    

    $stmt = $conn->prepare("INSERT INTO uploads(acc_no,file)VALUES(?,?)");
	$stmt->bind_param("is",$id,$folder);
	$stmt->execute();
	echo "Uploaded successfully";
	$stmt->close();
	$conn->close();
}
}
die;

?>