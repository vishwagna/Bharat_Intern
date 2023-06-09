
<?php

$showAlert=false;
$showError=false;
$userError=false;
$phoneError=false;
$error="";
include_once "config.php";
if(isset($_POST["submit"]))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $phn=$_POST['phoneNo'];

    
    if($stmt = $conn->prepare('SELECT user_id FROM user_details WHERE name = ?'))
    {
        $stmt->bind_param('s',$_POST['name']);
        $stmt->execute();
        $stmt->store_result();
        
        if($stmt->num_rows>0)
        {
            // echo 'Username already exists';
            $userError=true;
        }
        else
        {
            if($pass==$cpass)
            {
                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $sql="INSERT INTO `user_details` ( `name`, `email`, `password`, `phone`) 
                VALUES ('$name', '$email', '$pass', '$phn')";
        
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $showAlert=true;
                    header("location:index.php");
                }
            }
        
            else{
                $showError=true;
            }

        }
        $stmt->close();
    }
    else{
        echo 'Connection failed';
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="signup.css" rel="stylesheet" type="text/css">
    <title>Sign Up</title>
</head>
<body>
<?php
                    if($showAlert==true)
                    {
                        $error= '<strong>Congratulations!! </strong>Your Account is created Successfully';
                    }
                    if($showError==true)
                    {
                        $error= 'Error!! Make sure that you have entered the same password in both the feilds';
                    }

                    if($userError==true)
                    {
                        $error= 'Error!! Username Already Exists';
                    }
                ?> 
                <div class="container">
                    <div class="error"><?php echo $error; ?></div>
                <div class="content">
    <form action="signup.php" method="POST">
        <div class="user-details">
            <div class="input-box">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required/>
                </div>
                <div class="input-box">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required/>
                </div>
      <div class="input-box">  <label for="pass">Password</label>
        <input type="password" name="pass" id="pass" required/>
                </div>
       <div class="input-box"><label for="cpass">Confirm Password</label>
        <input type="password" name="cpass" id="cpass" required/>
                </div>
       <div class="input-box"> <label for="phoneNo">Phone Number</label>
        <input type="number" name="phoneNo" id="phoneNo" required/>
                </div>
                <div class="button"> <input type="submit" name="submit" value="SIGN UP"></div>
                </div>
    </form>
                </div>
    
                </div>
</body>
</html>