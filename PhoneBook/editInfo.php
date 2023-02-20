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

echo "<title>Edit Account Info</title>";


 echo "<style>body{background-color:#395a79;color:#001a33;font-size:xx-large;text-align:center} fieldset{width:50%;margin-left:25%}";
    echo ".table1,.table2{border-color:#F00;} .table1{width:40%;font-size:x-large;margin-left:0%;text-align:left} .table2{width:35%;margin-left:25%}";
    echo ".inputT{background-color:#8c99a6;width:100%;text-align:center;padding-top:5px;padding-bottom:5px;} .sb{background-color: #1e5bac;}";
    echo ".sb:hover{background-color: #2268c3;}.link,.link:visited{text-decoration:none;  color: darkblue;font-size:x-large} .link:hover{color: #003c8b;cursor: pointer;}</style>";
echo "<fieldset><legend>Personal Information</legend><form action='editInfo2.php' method='post'><table class='table1' align='center'><tr>";
echo "<th>Personal Name:</th><td><input name='uName' value='".$row['uName']."'></td></tr>";
echo "<tr><th><br>Username:</th><td><br><input name='Username' value='".$row['Username']."'></td></tr>";
echo "<tr><th><br>Password:</th><td><br><input type='password' name='Password' value='".$row['Password']."'></td></tr><tr><td colspan='2'><br><input type='submit' class='sb'></td></tr></table></form></fieldset>";

echo "<table class='table2' align='center'><tr>";
echo "<td><br><form method='post' id='homepageform' action='main.php'><input name='userName' value='".$userName."' hidden>";
echo "<input name='pwd' value='".$password."' hidden><a class='link' onclick='submitFunction()'>Home Page</a></td><td><a href='accInfo.php' class='link'>Account Info</a></td></form>";
echo "<td><form id='deleteAccountForm'action='deleteAcc.php'><br><a class='link' onclick='submitFunction2()'>Delete Account</a></td></tr></table>";
echo "<script>function submitFunction() {document.getElementById('homepageform').submit();}</script>";
echo "<script>function submitFunction2() {if(confirm('Are you sure you want to delete your account?')){document.getElementById('deleteAccountForm').submit();}}</script>";

    }}





else {
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large} .link{text-decoration:none;  color: darkblue;}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;}</style>";
    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>";
    echo "<tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}


$con->close();



?>
