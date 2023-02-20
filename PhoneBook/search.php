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
        
echo "<title>Search</title>";
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:xx-large;text-align:center} fieldset{width:50%;margin-left:25%}";
    echo ".table1,.table2{border-color:#F00;} .table1{width:90%;margin-left:5%} .table2{width:20%;margin-left:15%}";
    echo ".inputT{background-color:#8c99a6;width:35%;text-align:center;padding-top:5px;padding-bottom:5px;} .sb{background-color: #1e5bac;margin-left:5px;}";
        echo ".sb:hover{background-color: #2268c3;}.link,.link:visited{text-decoration:none;  color: darkblue;font-size:x-large} .link:hover{color: #003c8b;cursor: pointer;}</style>";

echo "<fieldset><legend>Enter Contact Name Or Phone Number</legend><form action='' method='get'><input name='inp1' class='inputT'><input type='submit' value='search' class='sb'></form>";

$inpType = gettype($_GET['inp1']);
$inp1 = $_GET['inp1'];

if (preg_match('/^[0-9]{0,15}+$/', $inp1)){
$sql2 = "select * from contacts where PhoneNumber = '$inp1' and userID = $ID";
$res2 = $con->query($sql2);

if ($res2->num_rows == 1){
    
   echo "<table class='table1 'align='center' border='1'><tr align='center'><th>Name</th><th>Phone Number</th><th>E-Mail</th></tr>";
    if ($row2 = $res2->fetch_assoc()){
echo "<tr align='center'><td>".$row2['Name']."</td>";
echo "<td>".$row2['PhoneNumber']."</td>";
echo "<td>".$row2['Mail']."</td></tr>";
echo '</table>';
    }}

else {
    echo "Contact Not Found!";
}

}



else{

$sql3 = "select * from contacts where Name = '$inp1' and userID = $ID";

$res3 = $con->query($sql3);
if ($res3->num_rows == 1){
echo "<table class='table1 'align='center' border='1'><tr align='center'><th>Name</th><th>Phone Number</th><th>E-Mail</th></tr>";
if ($row3 = $res3->fetch_assoc()){
echo "<tr align='center'><td>".$row3['Name']."</td>";
echo "<td>".$row3['PhoneNumber']."</td>";
echo "<td>".$row3['Mail']."</td></tr>";
echo '</table>';
}}

else {
    echo "Contact Not Found!";
   
}
}
echo "</fieldset>";
echo "<style> .table3{width:25%;margin-left:25%;}</style>";
echo "<form method='post' id='homepageform' action='main.php'><br><table class='table3' align='center'><tr><td><a href='view.php' class='link'>Contacts List</a></td>";
echo "<td><input name='userName' value='".$userName."' hidden>";
echo "<input name='pwd' value='".$password."' hidden><a class='link' onclick='submitFunction()'>Home Page</a></td></tr></table></form>";
echo "<script>function submitFunction() {document.getElementById('homepageform').submit();}</script>";


    }}

else {
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large} .link{text-decoration:none;  color: darkblue;}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;}</style>";
    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>";
    echo "<tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}

$con->close();


 ?>       



