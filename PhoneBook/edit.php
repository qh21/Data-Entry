<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
<style>
body{background-color:#395a79;color:#001a33;font-size:xx-large;text-align:center}
.link,.link:visited{text-decoration:none;  color: darkblue;font-size:x-large} 
.link:hover{color: #003c8b;cursor: pointer;}
</style>

    
</head>
<body>

<?php
session_start();
$userName = $_SESSION["userName"];
$password = $_SESSION["pwd"];

$contactID = $_SESSION["contactID"];

$serverName = 'localhost';
$dbuserName = 'root';
$dbpassword = '';
$dbName = 'contacts_list';

$con = new mysqli($serverName, $dbuserName, $dbpassword, $dbName);

$sql1 = "SELECT * from users where Username = '$userName' AND Password = '$password'";
$res1 = $con->query($sql1);

if ($res1->num_rows == 1){
   
    if ($row = $res1->fetch_assoc()){
     
$sql2 = "select * from contacts where contactID = $contactID";

$res2 = $con->query($sql2);

if ($res2->num_rows > 0){

    echo "<style> fieldset{width:50%;margin-left:25%}
    .table1,.table2{border-color:#F00;} 
    .table1{width:70%;margin-left:15%;} 
    .table2{width:20%;margin-left:15%;}
    .inputT{background-color:#8c99a6;width:96%;padding-block:2%;text-align:center;
    padding-top:5px;padding-bottom:5px;}
     .sb{background-color: #1e5bac;margin-right:25px}
    .sb:hover{background-color: #2268c3;}</style>
    <form method='post' action='edit.php'><fieldset><legend>Edit Contact Information</legend>
    <table class='table1 'align='center' border='1'><tr align='center' style='font-size:large;'><th>Name</th><th>Phone Number</th><th>E-Mail</th></tr>";
if ($row2 = $res2->fetch_assoc()){

echo "<tr align='center'><td><input class='inputT' name='contactName' value='".$row2['Name']."' required></td>
<td><input type='tel' class='inputT' name='PhoneNumber' value='".$row2['PhoneNumber']."' required></td>
<td><input type='email' class='inputT' name='mail' value='".$row2['Mail']."'></td>
</tr>";
}

echo "</table>
<table class='table2'><tr><td><input class='sb' type='submit' value='Edit'><input name='formType' value='updateValues' hidden></form></td><td align='left'>
<form method='post' action='edit.php' onSubmit=".'"'."return confirm('Are you sure you want to delete ".$row2['Name']." from your contacts list?');".'"'.">
<input class='sb' type='submit' value='Delete Contact'><input name='formType' value='deleteContact' hidden></form></td></tr></table></fieldset>
<style> .table3{width:25%;margin-left:22%;margin-right:15px;}</style>
<br><table class='table3' align='left'><tr><td><a href='view.php' class='link'>Contacts List</a></td>
<td><a href='main.php' class='link'>Home Page</a></td></tr></table>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 
 $formType = $_POST['formType'];
 if ($formType == 'updateValues')
 {
  $contactName = $_POST['contactName'];
  $mail = $_POST['mail'];
  $PhoneNumber = $_POST['PhoneNumber'];


  $sql3 = "UPDATE contacts SET Name = '$contactName', PhoneNumber = '$PhoneNumber', Mail = '$mail' WHERE contactID = $contactID";

  $res3 = $con->query($sql3);
  
  echo "<script type='text/javascript'>window.history.back();
  

 
          function disableForward() {
            window.history.forward();
        }
        setTimeout('disableForward()', 0);
        window.onunload = function () { null };


window.alert('Contact Information has been Updated!');
        
      </script>";
  

}

elseif ($formType == 'deleteContact')
{
     
    $sql3 = "DELETE FROM contacts WHERE contactID = '$contactID'";

    $res3 = $con->query($sql3);

    header('Location: view.php');
    exit;

}

}

}

}


else {
    echo "<table width='50%' style='padding-top:2%;padding-left=25%;' align='center'><tr><th>Please Login First!</th></tr>
    <tr align='center'><td><br><a href='index.php' class='link'>Back To Login</a></td></tr></table>";

}   

$con->close();

?>

    
</body>
</html>
