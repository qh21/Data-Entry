<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>

    </style>

    <title>Home Page</title>
  </head>
  <body>





<?php
    session_start();
#$userName = $_SESSION["userName"];  
#$password = $_SESSION["pwd"];


$userName = $_POST["userName"];  
$password = $_POST["pwd"];

$serverName = 'localhost';
$dbuserName = 'root';
$dbpassword = '';
$dbName = 'contacts_list';


$con = new mysqli($serverName, $dbuserName, $dbpassword, $dbName);

$sql1 = "SELECT * from users where Username = '$userName' AND Password = '$password'";
$res1 = $con->query($sql1);

if ($res1->num_rows == 1){

    $_SESSION["userName"] = $userName;
     $_SESSION["pwd"] = $password;
    
    if ($row = $res1->fetch_assoc()){
        $_SESSION["ID"] = $row['ID'];
        echo "<title>HomePage</title>";
        echo "<style>body{background-color:#395a79;color:#001a33;font-size:xx-large;} .link,.link:visited{text-decoration:none;  color: darkblue;}";
        echo " .link:hover{color: #003c8b;cursor: pointer;} table{border-color:#F00;} fieldset{width:70%;margin-left:15%;}</style>";
        echo "<fieldset><legend> Welcome ".$row['uName']."! </legend><table border='1' cellspacing='6' cellpadding='9' width='50%' height='250px' align='center'>";
        echo "<br><br><tr align='center'><td><a class='link' href='view.php'>View Contacts</a></td><td><a class='link' href='add.php'>Add New Contact</a></td></tr>";
        echo "<tr align='center'><td><a class='link' href='search.php'>Search</a></td><td><a class='link' href='accInfo.php'>Account info</a></td></tr></table><br><br></fieldset>";
        echo "<style> .loTable{margin-right:15%;font-size:x-large;}</style>";
        echo "<br><table class='loTable' align='right'><tr><td><a class='link' href='index.php' onclick=".'"'."return confirm('Are you sure you want to logout?');".'"'.">Logout</a></td></tr></table>";





}
}


else {

    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;cursor: pointer;}</style>";
    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Invalid Username Or Password!</th></tr>";
    echo "<tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}   



$con->close();
  ?>
</html>
