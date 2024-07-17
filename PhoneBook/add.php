<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>

<style>
body{background-color:#395a79;color:#001a33;font-size:xx-large;text-align:center;} 
.link,.link:visited{text-decoration:none;  color: darkblue;font-size:x-large;} 
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
    .table1,.table2{border-color:#F00;} .table1{width:70%;margin-left:15%} .table2{width:20%;margin-left:8%}
    .inputT{background-color:#8c99a6;width:96%;padding-block:2%;text-align:center;padding-top:5px;padding-bottom:5px;} .sb{background-color: #1e5bac;}
    .sb:hover{background-color: #2268c3;}</style>
    <form method='post' action='add.php'><fieldset><legend>Add New Contact</legend>
    <table class='table1 'align='center' border='1'>
<tr align='center'><td><input class='inputT' name='contactName' placeholder='Name' required></td><td>
<input type='tel' class='inputT' name='PhoneNumber' placeholder='Phone Number' required></td>
<td><input type='email' class='inputT' name='mail' placeholder='E-Mail'></td></tr>
<table class='table2'><tr><td><input class='sb' type='submit' value='Add'></form></td></tr></table></fieldset>
<style> .table3{width:25%;margin-left:22%;}</style>
<br><table class='table3' align='center'><tr><td><a href='view.php' class='link'>Contacts List</a></td>
<td><a href='main.php' class='link'>Home Page</a></td></tr></table></form>";

}



else {

    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>
    <tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}   








if ($_SERVER["REQUEST_METHOD"] == "POST")




{

$contactName = $_POST['contactName'];
$mail = $_POST['mail'];
$PhoneNumber = $_POST['PhoneNumber'];


$sql2 = "INSERT INTO contacts (contactID, Name, PhoneNumber, Mail, userID)
VALUES (DEFAULT, '$contactName', '$PhoneNumber', '$mail', '$ID');";

$res2 = $con->query($sql2);

$_SESSION["contactID"] = $con->insert_id;


header('Location: edit.php');
exit;

}



}
$con->close();

?>


    
</body>
</html>
