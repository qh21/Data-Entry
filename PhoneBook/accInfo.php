<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Info</title>

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

 echo "<style>fieldset{width:50%;margin-left:25%}
 .table1,.table2{border-color:#F00;} 
 .table1{width:35%;font-size:x-large;margin-left:0%;text-align:left} 
 .table2{width:35%;margin-left:24%}
.inputT{background-color:#8c99a6;width:100%;text-align:center;padding-top:5px;padding-bottom:5px;} .sb{background-color: #1e5bac;}
.sb:hover{background-color: #2268c3;}</style>
<fieldset><legend>Personal Information</legend><table class='table1' align='center'><tr><th>Personal Name:</th><td>".$row['uName']."</td></tr>
<tr><th><br>Username:</th><td><br>".$row['Username']."</td></tr></table></fieldset>
<br><table class='table2' align='center'><tr>
<td><a href='main.php' class='link'>Home Page</a></td>
<td><a href='editInfo.php' class='link'>Edit Account Info</a></td>
<td><form id='deleteAccountForm' method='POST' action='accInfo.php'><a class='link' onclick='submitFunction2()'>Delete Account</a></td></tr></table>
<script>function submitFunction2() {if(confirm('Are you sure you want to delete your account?')){document.getElementById('deleteAccountForm').submit();}}</script>";

    }}



else {
    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>
    <tr align='center'><td><br><a href='logout.php' class='link'>Back To Login</a></td></tr></table>";

}




if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $sql2 = "DELETE FROM contacts WHERE userID = '$ID'";

        $res2 = $con->query($sql2);     
        $sql3 = "DELETE FROM users WHERE ID = '$ID'";
        
        $res3 = $con->query($sql3);
        header('Location: logout.php');
        exit;
        
    }


$con->close();

?>
</body>
</html>

