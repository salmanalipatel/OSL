<?php

$host="localhost";
$user="oslcompk";
$password="Rahim2020";
$db="oslcompk_oriental";

session_start();
  if(isset($_SESSION["username"])=="user")
  {
    header("location:User_index.php");
  }
  else if(isset($_SESSION["username"])=="admin")
  {
      header("location:Admin_index.php");
  }

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username= stripcslashes($username);
$password= stripcslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);

	$username=$_POST["username"];
	$password=$_POST["password"];
	


    

	

	$sql="select * from login where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	

		$_SESSION["username"]=$username;

		header("location:User_index.php");
	}

	elseif($row["usertype"]=="admin")
	{

		$_SESSION["username"]=$username;
		
		header("location:Admin_index.php");
	}

else
	{
		echo '<script> alert("Password Incorrect"); </script>
       ';
	}

}




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
body{
    background-image: url(assets/stock.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-blend-mode: overlay;
    background-color: #ffffff5e;
}
.container {
        width: 416px;
        padding: 30px;
        background-color: white;
        margin: 100px auto;
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
    }

    .container h2 {
        margin: 0;
        padding: 0;
        text-align: center;
        color: #333;
    }

    .container .input-group {
        margin: 0px 0;
    }

    .container .input-group label {
        display: block;
        text-align: left;
        margin: 0;
        padding: 0;
        color: #666;
    }

    .container .input-group input {
    width: 100%;
    padding: 10px;
    margin: 0;
    border: 1px solid #ddd;
    box-sizing: border-box;
    font-size: 12px;
    margin-top: 15px;
}

    .container .input-group button {
        width: 50%;
        padding: 8px;
        margin: 10px 0;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    .container .input-group button:hover {
        background-color: #45a049;
    }

    .container a {
        color: #333;
        text-decoration: none;
    }

    .container a:hover {
        text-decoration: underline;
    }
    .container.login-box img {display: table;margin: 0 auto;}

    .container.login-box p {
    text-align: center;
    font-family: 'satoshi';
    font-size: 18px;
    margin: 0;
    text-transform: uppercase;
    }   
    .login-box form label {
    font-family: 'satoshi';
    margin-top: 20px !important;
    margin-bottom: 5px !important;
    text-transform: uppercase;
}

.login-box form button input {
    font-family: 'satoshi';
    font-size: 16px !important;
    background: #00275f;
    padding: 0px;
    color: #fff;
    transition: all ease 500ms;
    margin-top: 5px !important;
}
.login-box form button input:hover,
a.form-btn2:hover {
    transition:all ease 500ms;
    background: #94a3b8;
    text-decoration:none;
}


.login-box form button {
    background: transparent !important;
    padding: 0px !important;
}
.form-btns {
    display: flex;
    align-items: center;
    justify-content: center;
}

a.form-btn2 {
    margin-left: 10px;
    width: 50%;
    background: #00275f;
    padding: 10px 10px;
    text-align: center;
    font-family: 'satoshi';
    color: #fff;
    margin-top: 5px;
    font-size: 16px;
    transition: all ease 500ms;
    text-decoration: none;
}
a.forgot-passlink {
    font-family: 'satoshi';
    display: table;
    margin: 0 auto;
    font-size: 14px;
    margin-top: 10px;
}
    </style>
<body>
<div id="layoutSidenav">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-5">
            
            <div class="container login-box"> 
            <img src="assets/logo-new.png" style="height: 60px;">
            <br/>
            <br/>
                      <p style="color:black"><b>Admin Login </b></p></h2> 
                <form action="#" method="post">

                <div class="input-group">
                     <!-- <label for="text">username</label> -->
                <input type="text" id="name" name="username" required placeholder="Username"> </div> 

                <div class="input-group"> 
                    <!-- <label for="password">Password</label> -->
                    <input type="password" id="password" name="password" required placeholder="Password"> </div> 
                    
                    <div class="input-group form-btns">
                    <button type="submit"><input type="submit" value="Login"></button>
                    <a href="#" class="form-btn2">Back to Website</a>
                </div> 
                </form>
                    <!-- <a class="forgot-passlink" href="password-recovery.php">Forgot Password?</a></div> -->

        </div>
    </main>

       
          
  
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        

    </body>
</html> 