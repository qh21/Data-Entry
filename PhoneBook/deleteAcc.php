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

           
$sql2 = "DELETE FROM contacts WHERE userID = '$ID'";

$res2 = $con->query($sql2);     
$sql3 = "DELETE FROM users WHERE ID = '$ID'";

$res3 = $con->query($sql3);

    echo "<title>Delete</title>";
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large;text-align:center;} fieldset{width:50%;margin-left:25%}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;}</style>";
    echo "<h1 align='center'>Account Has Been Deleted!</h1>";
echo "<style> .table3{width:25%;margin-left:40%;font-size:x-large;}</style>";
echo "<br><table class='table3' align='center'><tr>";
echo "<a class='link' href='index.php' >Login Page</a></td></tr></table>";

}}
else {
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large} .link{text-decoration:none;  color: darkblue;}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;}</style>";
    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>";
    echo "<tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}   
$con->close();

?>