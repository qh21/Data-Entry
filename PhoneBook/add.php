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
   
    if ($row = $res1->fetch_assoc()){}

    echo "<title>Add</title>";
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:xx-large;text-align:center} fieldset{width:50%;margin-left:25%}";
    echo ".table1,.table2{border-color:#F00;} .table1{width:70%;margin-left:15%} .table2{width:20%;margin-left:15%}";
    echo ".inputT{background-color:#8c99a6;width:100%;text-align:center;padding-top:5px;padding-bottom:5px;} .sb{background-color: #1e5bac;}";
    echo ".sb:hover{background-color: #2268c3;}.link,.link:visited{text-decoration:none;  color: darkblue;font-size:x-large} .link:hover{color: #003c8b;cursor: pointer;}</style>";
    echo "<form method='post' action='add2.php'><fieldset><legend>Add New Contact</legend>";
    echo "<table class='table1 'align='center' border='1'>";
echo "<tr align='center'><td><input class='inputT' name='contactName' placeholder='Name' required></td><td>";
echo "<input type='tel' class='inputT' name='PhoneNumber' placeholder='Phone Number' required></td>";
echo "<td><input type='email' class='inputT' name='mail' placeholder='E-Mail'></td></tr>";
echo "<table class='table2'><tr><td><br><input class='sb' type='submit' value='Add'></form></td></tr></table></fieldset>";
echo "<style> .table3{width:25%;margin-left:25%;}</style>";
echo "<form method='post' id='homepageform' action='main.php'><br><table class='table3' align='center'><tr><td><a href='view.php' class='link'>Contacts List</a></td>";
echo "<td><input name='userName' value='".$userName."' hidden>";
echo "<input name='pwd' value='".$password."' hidden><a class='link' onclick='submitFunction()'>Home Page</a></td></tr></table></form>";
echo "<script>function submitFunction() {document.getElementById('homepageform').submit();}</script>";


}



else {
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;cursor: pointer;}</style>";
    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>";
    echo "<tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}   



$con->close();









?>