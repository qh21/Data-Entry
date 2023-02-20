<?php

$serverName = 'localhost';
$dbuserName = 'root';
$dbpassword = '';
$dbName = 'contacts_list';



$con = new mysqli($serverName, $dbuserName, $dbpassword, $dbName);

echo "<title>Create Account</title>";


 echo "<style>body{background-color:#395a79;color:#001a33;font-size:xx-large;text-align:center} fieldset{width:50%;margin-left:25%}";
    echo ".table1,.table2{border-color:#F00;} .table1{width:40%;font-size:x-large;margin-left:0%;text-align:left} .table2{width:35%;margin-left:25%}";
    echo ".inputT{background-color:#8c99a6;width:100%;text-align:center;padding-top:5px;padding-bottom:5px;} .sb{background-color: #1e5bac;}";
    echo ".sb:hover{background-color: #2268c3;}.link,.link:visited{text-decoration:none;  color: darkblue;font-size:x-large} .link:hover{color: #003c8b;cursor: pointer;}</style>";
echo "<fieldset><legend>Enter Your Personal Information</legend><form action='create2.php' method='post'><table class='table1' align='center'><tr>";
echo "<th>Personal Name:</th><td><input name='uName' placeholder='Personal Name' required></td></tr>";
echo "<tr><th><br>Username:</th><td><br><input name='Username' placeholder='Username' required></td></tr>";
echo "<tr><th><br>Password:</th><td><br><input type='password' name='Password' placeholder='Password' required></td></tr><tr><td colspan='2'><br><input type='submit' class='sb'></td></tr></table></form></fieldset>";

echo "<table class='table2' align='center'><tr>";
echo "<td><br><a class='link' href='index.php'>Back to Login</a></td></tr></table>";





$con->close();

?>