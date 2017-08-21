<?php
session_start();
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['register_btn']))
{
    $username=mysql_real_escape_string($_POST['username']);
    $email=mysql_real_escape_string($_POST['email']);
    $password=mysql_real_escape_string($_POST['password']);
    $password2=mysql_real_escape_string($_POST['password2']);  
     if($password==$password2)
     {    
            $password=md5($password); 
            $sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
            mysqli_query($db,$sql);  
            $_SESSION['message']="logged in"; 
            $_SESSION['username']=$username;
            header("location:home.php"); 
    }
    else
    {
      $_SESSION['message']="password do not match";   
     }
}
?>
<html>
<head>
  <title>Sign up</title>

</head>
<body>
<div class="header">
   <img src="register.jpg" alt="signup" style="width:920px;height350px; align="middle">
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="register.php">
  <table>
     <tr>
           <td>Username : </td>
           <td><input type="text" name="username" class="textInput"></td>
     </tr>
     <tr>
           <td>Email : </td>
           <td><input type="email" name="email" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td>Password again: </td>
           <td><input type="password" name="password2" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="register_btn" class="Register" ></td>
     </tr>
 
</table>
</form>
</body>
</html>
