<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account Info</title>
<style>


body{background-color:#395a79;color:#001a33;font-size:xx-large;text-align:center}
.link,.link:visited{text-decoration:none;  color: darkblue;font-size:x-large} 
.link:hover{color: #003c8b;cursor: pointer;}

</style>

</head>
<body>

<?php
session_start();

$userName = $_SESSION["userName"];
$password = $_SESSION["pwd"];
$ID = $_SESSION["ID"];

$serverName = 'localhost';
$dbuserName = 'root';
$dbpassword = '';
$dbName = 'contacts_list';



$con = new mysqli($serverName, $dbuserName, $dbpassword, $dbName);

$sql1 = "SELECT * from users where Username = '$userName' AND Password = '$password'";
$res1 = $con->query($sql1);

if ($res1->num_rows == 1){
   
    if ($row = $res1->fetch_assoc()){

 echo "<style> fieldset{width:50%;margin-left:25%}
    .table1,.table2{border-color:#F00;} .table1{width:40%;font-size:x-large;margin-left:0%;text-align:left} .table2{width:35%;margin-left:23%}
    .inputT{background-color:#8c99a6;width:100%;text-align:center;padding-top:5px;padding-bottom:5px;} .sb{background-color: #1e5bac;}
    .sb:hover{background-color: #2268c3;}</style>
<form action='editInfo.php' method='post'>
<fieldset><legend>Personal Information</legend><table class='table1' align='center'>
<input name='formType' value='updateValues' hidden>
<tr><th>Personal Name:</th><td><input name='uName' value='".$row['uName']."'></td></tr>
<tr><th><br>Username:</th><td><br><input name='Username' value='".$row['Username']."'></td></tr>
<tr><th><br>Password:</th><td><br><input type='password' name='Password' value='".$row['Password']."'></td></tr><tr><td colspan='2'><br><input type='submit' class='sb'>
</td></tr></table></fieldset></form>
<table class='table2' align='center'><br><tr>
<td><a href='main.php' class='link'>Home Page</a></td><td><a href='accInfo.php' class='link'>Account Info</a></td></form>
<td><form id='deleteAccountForm'action='editInfo.php'><input name='formType' value='deleteAccount' hidden>
<a class='link' onclick='submitFunction2()'>Delete Account</a></td></tr></table>
<script>function submitFunction2() {if(confirm('Are you sure you want to delete your account?')){document.getElementById('deleteAccountForm').submit();}}</script>";

    }}





else {

echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large} .link{text-decoration:none;  color: darkblue;}
.link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;}</style>
<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>
<tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}



if ($_SERVER["REQUEST_METHOD"] == "POST"){




    $formType = $_POST['formType'];
    if ($formType == 'updateValues')
    {

    $uName = $_POST['uName'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

$_SESSION['userName'] = $Username;
$_SESSION["pwd"] = $Password;
$sql2 = "UPDATE users SET uName = '$uName', Username = '$Username', Password = '$Password' WHERE ID = $ID";
$res2 = $con->query($sql2);

echo "<script type='text/javascript'>window.history.back();
  

 
function disableForward() {
  window.history.forward();
}
setTimeout('disableForward()', 0);
window.onunload = function () { null };


window.alert('Account Information has been Updated!');

</script>";


    }

    if ($formType == 'deleteAccount')
    {

           
        $sql2 = "DELETE FROM contacts WHERE userID = '$ID'";

        $res2 = $con->query($sql2);     
        $sql3 = "DELETE FROM users WHERE ID = '$ID'";
        
        $res3 = $con->query($sql3);



        header('Location: logout.php');
        exit;
        

    }






}

$con->close();



?>
    
    </body>
</html>
