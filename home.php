<?php
session_start();

$db=mysqli_connect("localhost","root","","authentication");


?>
<html>
<head>
  <title>Home</title>
<h1>BELOW LIST OF RESUMES</h1>
</head>
<body>
<div class="header">
   <ul>
  <li>
<a href="sugandhi.docx">Sugandhi </a></li>
  <li>
<a href="suba.docx">Suba</a></li>
  <li>
<a href="megna.docx">Megna</a></li>
</ul>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>

<a href="logout.php">
  <input type="image" src="logout.png" align="center" alt="Submit" width="60" height="60">
</a>
</body>
</html>
