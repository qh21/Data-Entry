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
    $contactID = $_SESSION["contactID"];
    $contactName = $_POST['contactName'];
    $mail = $_POST['mail'];
    $PhoneNumber = $_POST['PhoneNumber'];

    
    if ($row = $res1->fetch_assoc()){
     
$sql2 = "UPDATE contacts SET Name = '$contactName', PhoneNumber = '$PhoneNumber', Mail = '$mail' WHERE contactID = $contactID";

$res2 = $con->query($sql2);
    echo "<title>Edit</title>";
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large;text-align:center;} fieldset{width:50%;margin-left:25%}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;cursor: pointer;}</style>";
    echo "<h1 align='center'>Contact Information Has Been Updated!</h1>";
echo "<style> .table3{width:25%;margin-left:40%;font-size:x-large;}</style>";
echo "<form method='post' id='homepageform' action='main.php'><br><table class='table3' align='center'><tr><td><a href='view.php' class='link'>Contacts List</a></td>";
echo "<td><input name='userName' value='".$userName."' hidden>";
echo "<input name='pwd' value='".$password."' hidden><a class='link' onclick='submitFunction()'>Home Page</a></td></tr></table></form>";
echo "<script>function submitFunction() {document.getElementById('homepageform').submit();}</script>";
}}
else {
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large} .link{text-decoration:none;  color: darkblue;}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;cursor: pointer;}</style>";
    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>";
    echo "<tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}   
$con->close();

?>
