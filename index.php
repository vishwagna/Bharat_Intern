<?php
$loginError=false;
$error="";
include_once "config.php";
if(isset($_POST["lSubmit"])){
    $lname=$_POST["user"];
    $lpass=$_POST["pass"];
$sql="SELECT * from user_details where email='$lname'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
    
        if($result->num_rows==1 && password_verify($lpass,$row['password']))
        {
            session_start();
            $_SESSION['username']=$lname;
            $_SESSION['password']=$lpass;
            $_SESSION['name']=$row['name'];
            header("location:welcome.php");
        }
        
        else{
            // echo "Invalid Login Credentials";
            $loginError=true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4631c0acdf.js" crossorigin="anonymous"></script>
    <title>MY BLOG (log in)</title>
</head>
<body>
<?php
                        if($loginError==true)
                        {
                            $error= 'Error!! Invalid Login Credentials';
                             
                        }
                    ?>
                    <div class="container">
                        <div class="error"><?php echo $error; ?> </div>
                        <form action="index.php" method="POST">
                            <i class="fa fa-solid fa-user"></i>
                            <input type="text" class="input" name="user" placeholder="Your Username" required/>
                            <br>
                            <i class="fa fa-solid fa-lock"></i>
                            <input type="password" class="input" name="pass" placeholder="Your Password" required/>
                           <br> <input type="submit" class="btn1" name="lSubmit" value="LOG IN"/>
                            <p>Don't have an account? , <a href="signup.php">Sign Up</a></p>
                        </form>
                    </div>
</body>
</html>