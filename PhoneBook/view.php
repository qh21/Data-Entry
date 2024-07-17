<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

<style>
body{background-color:#395a79;color:#001a33;font-size:x-large} 
.link{text-decoration:none;  color: darkblue;}";
.link,.link:visited{text-decoration:none;  color: darkblue;} 
.link:hover{color: #003c8b;}

</style>

</head>
<body>
    


<?php
session_start();
$userName = $_SESSION["userName"];
$password = $_SESSION["pwd"];

$ID = $_SESSION["ID"];
$temp = 0;
$serverName = 'localhost';
$dbuserName = 'root';
$dbpassword = '';
$dbName = 'contacts_list';

$con = new mysqli($serverName, $dbuserName, $dbpassword, $dbName);

$sql1 = "SELECT * from users where Username = '$userName' AND Password = '$password'";
$res1 = $con->query($sql1);

if ($res1->num_rows == 1){
   
    if ($row = $res1->fetch_assoc()){
        
    echo "<style>fieldset{width:70%;margin-left:15%}
    .table1,.table2{border-color:#F00;} .table1{width:90%;margin-left:5%} .table2{width:20%;margin-left:15%}
    .inputT{background-color:#8c99a6;text-align:center;padding-top:5px;padding-bottom:5px;margin-left:15px;} 
    .sb{background-color: #1e5bac;margin-left:15px;margin-right:15px}
        .sb:hover{background-color: #2268c3;}</style>";

echo "<form action='view.php' method='get'><fieldset><legend><input name='inp1' id='inpID1' class='inputT'><input type='submit' value='search' class='sb'></legend>
</form>";



if ($_SERVER["REQUEST_METHOD"] == "GET")
{
global $temp;

if (isset($_GET['inp1'])) {
$inpType = gettype($_GET['inp1']);
$inp1 = $_GET['inp1'];}
else {
    $inp1 = "";
}
$temp = (string)$inp1;
#if (preg_match('/^[0-9]{0,15}+$/', $inp1)){
$sql2 = "select * from contacts where (PhoneNumber like '%$inp1%' or Name like '%$inp1%') and userID = $ID";
$res2 = $con->query($sql2);

if ($res2->num_rows> 0){
    
   echo "<br><table class='table1 'align='center' border='1'><tr align='center'><th>Name</th><th>Phone Number</th><th>E-Mail</th><th>Edit</th</tr>";
   while ($row2 = $res2->fetch_assoc()){

    echo "<tr align='center'><td>".$row2['Name']."</td><td>".$row2['PhoneNumber']."</td><td>".$row2['Mail']."</td>
    <td><br><form action='view.php' method='post'><input name='contactID' value='".$row2['contactID']."' hidden>
    <input class='sb' type='submit' value='Edit'></form><br></td></tr>";



    }
echo "</table>";
}

else {
    echo "<br>Contact Not Found!";
}

echo "<script>document.getElementById('inpID1').value ='".(string)$temp."'</script>";
#}



}

if ($_SERVER["REQUEST_METHOD"] == "POST"){


    $_SESSION["contactID"] = $_POST["contactID"];
  
    header('Location: edit.php');
    exit;





}



echo "</fieldset>
<style> .table3{width:25%;margin-left:15%;}</style>
<br><table class='table3' align='center'><tr><td><a href='add.php' class='link'>Add New Contact</a></td>
<td><a class='link' href='main.php'>Home Page</a></td></tr></table></form>";

    }}

else {

    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>
    <tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}

$con->close();


 ?>       



</body>
</html>
