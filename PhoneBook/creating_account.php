<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<style>
body{background-color:#395a79;color:#001a33;font-size:x-large;text-align:center;} 
fieldset{width:50%;margin-left:25%}
.link,.link:visited{text-decoration:none;  color: darkblue;} 
.link:hover{color: #003c8b;}
.table3{width:25%;margin-left:40%;font-size:x-large;}
</style>


</head>
<body>


<?php    
$serverName = 'localhost';
$dbuserName = 'root';
$dbpassword = '';
$dbName = 'contacts_list';



$con = new mysqli($serverName, $dbuserName, $dbpassword, $dbName);
    $uName = $_POST['uName'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

$sql1 = "SELECT * from users where Username = '$Username'";
$res1 = $con->query($sql1);
if ($res1->num_rows == 1){


    echo "<title>Account Already Exists</title>
   <h1 align='center'>Account Already Exists!<br>Try Another Username</h1>
<br><table class='table3' align='center'><tr><td><a href='create.php' class='link'>Back</a></td>
<td><td><a href='index.php' class='link'>Login Screen</a></td></tr></table>";



}


else
{

$sql2 = "INSERT INTO users (ID, uName, Username, Password)
 VALUES (DEFAULT, '$uName', '$Username', '$Password');";

$res2 = $con->query($sql2);
session_start();

$_SESSION["userName"] = $Username;
 $_SESSION["pwd"] = $Password;

    echo "<title>Create Account</title>
    <h1 align='center'>Account Has Been Created!</h1>
<br><table class='table3' align='center'><tr><td><a href='logout.php' class='link'>Login Screen</a></td>
<td><a href='main.php' class='link'>Home Page</a></td></tr></table>";

}
$con->close();


?>    
</body>
</html>
