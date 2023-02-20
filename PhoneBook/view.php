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
     
$sql2 = "select * from contacts where userID = $ID" ;

$res2 = $con->query($sql2);

if ($res2->num_rows > 0){  
    echo "<title>Contacts List</title>";
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large} .link,.link:visited{text-decoration:none;  color: darkblue;} h1{margin-top:1%;}";
    echo ".link:hover{color: #003c8b;cursor: pointer;} table{width:50%;left:25%;border-color:#F00;font-size:x-large;} .sb{background-color: #1e5bac;}.sb:hover{background-color: #2268c3;}</style>";
    echo "<h1 align='center'>Contacts List</h1>";
    echo "<br><table align='center' border='1'><tr align='center'><th>Name</th><th>Phone Number</th><th>E-Mail</th><th>Edit</th></tr>";
while ($row2 = $res2->fetch_assoc()){

echo "<tr align='center'><td>".$row2['Name']."</td><td>".$row2['PhoneNumber']."</td><td>".$row2['Mail']."</td>";
echo "<td><form action='edit.php' method='post'><input name='contactID' value='".$row2['contactID']."' hidden><br><input class='sb' type='submit' value='Edit'></form></td></tr>";

}
echo '</table>'; 
$_SESSION["userName"] = $userName;
$_SESSION["pwd"] = $password;
echo "<style> .table2{width:25%;margin-left:25%;}</style>";
echo "<form method='post' id='homepageform' action='main.php'><br><table class='table2' align='center'><tr><td><a class='link' href='add.php'>Add New Contact</a></td>";
echo "<td><input name='userName' value='".$userName."' hidden>";
echo "<input name='pwd' value='".$password."' hidden><a class='link' onclick='submitFunction()'>Home Page</a></td></tr></table></form>";
echo "<script>function submitFunction() {document.getElementById('homepageform').submit();}</script>";
}
else {
    $_SESSION["userName"] = $userName;
$_SESSION["pwd"] = $password;
     echo "<title>Contacts List</title>";
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large;text-align:center} .link,.link:visited{text-decoration:none;  color: darkblue;} h1{margin-top:1%;}";
    echo ".link:hover{color: #003c8b;cursor: pointer;} </style>";
echo "<h1>No Contacts In The Database!</h1>";
echo "<a class='link' href='add.php'>Add New Contact</a>";



}




}
}


else {
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;cursor: pointer;}</style>";
    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>";
    echo "<tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}   



$con->close();




?>