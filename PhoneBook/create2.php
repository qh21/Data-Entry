<?php    
$serverName = 'localhost';
$dbuserName = 'root';
$dbpassword = '';
$dbName = 'contacts_list';



$con = new mysqli($serverName, $dbuserName, $dbpassword, $dbName);
    $uName = $_POST['uName'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];


     
$sql1 = "INSERT INTO users (ID, uName, Username, Password)
 VALUES (DEFAULT, '$uName', '$Username', '$Password');";

$res1 = $con->query($sql1);
session_start();

$_SESSION["userName"] = $Username;
 $_SESSION["pwd"] = $Password;

    echo "<title>Add</title>";
    echo "<style>body{background-color:#395a79;color:#001a33;font-size:x-large;text-align:center;} fieldset{width:50%;margin-left:25%}";
    echo ".link,.link:visited{text-decoration:none;  color: darkblue;} .link:hover{color: #003c8b;}</style>";
    echo "<h1 align='center'>Account Has Been Created!</h1>";
echo "<style> .table3{width:25%;margin-left:40%;font-size:x-large;}</style>";
echo "<form method='post' id='homepageform' action='main.php'><br><table class='table3' align='center'><tr><td><a href='index.php' class='link'>Login Screen</a></td>";
echo "<td><input name='userName' value='".$Username."' hidden>";
echo "<input name='pwd' value='".$Password."' hidden><a class='link' onclick='submitFunction()'>Home Page</a></td></tr></table></form>";
echo "<script>function submitFunction() {document.getElementById('homepageform').submit();}</script>";

$con->close();


?>