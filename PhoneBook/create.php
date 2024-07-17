<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>



    <style>
    body{background-color:#395a79;color:#001a33;font-size:xx-large;text-align:center} 
    fieldset{width:50%;margin-left:25%}
    .table1,.table2{border-color:#F00;} 
    .table1{width:40%;font-size:x-large;margin-left:0%;text-align:left} 
    .table2{width:35%;margin-left:12%}
    .inputT{background-color:#8c99a6;width:100%;text-align:center;padding-top:5px;padding-bottom:5px;} 
    .sb{background-color: #1e5bac;}";
    .sb:hover{background-color: #2268c3;}.link,.link:visited{text-decoration:none;  color: darkblue;font-size:x-large} 
    .link:hover{color: #003c8b;cursor: pointer;}
    </style>
</head>
<body>


<?php

$serverName = 'localhost';
$dbuserName = 'root';
$dbpassword = '';
$dbName = 'contacts_list';



$con = new mysqli($serverName, $dbuserName, $dbpassword, $dbName);

 echo "<fieldset><legend>Enter Your Personal Information</legend><form action='creating_account.php' method='post'><table class='table1' align='center'><tr>
<th>Personal Name:</th><td><input name='uName' placeholder='Personal Name' required></td></tr>
<tr><th><br>Username:</th><td><br><input name='Username' placeholder='Username' required></td></tr>
<tr><th><br>Password:</th><td><br><input type='password' name='Password' placeholder='Password' required></td></tr><tr><td colspan='2'><br><input type='submit' class='sb'>
</td></tr></table></form></fieldset>
<table class='table2' align='center'><tr>
<td><br><a class='link' href='index.php'>Back to Login</a></td></tr></table>";
$con->close();

?>



    
</body>
</html>
