<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      body {
        background-color: #395a79;
        color: #001a33;
        font-size: x-large;
      }

      #ca {
        text-decoration: none;
        color: darkblue;
      }
      #ca:hover {
        color: #003c8b;
      }
      #sb {
        background-color: #1e5bac;
      }
      .field_set {
        border-color: #f00;
        width: 50%;
        margin-left: 25%;
      }
    </style>

    <title>PhoneBook</title>
  </head>
  <body>
    <h1 align="center">Welcome to PhoneBook</h1>

    <fieldset class="field_set">
      <legend style="font-size: large">
        Enter username and password to login
      </legend>
      <form action="index.php" method="post">
        <table align="center">
          <tr>
            <th>Username:</th>
            <td><input name="userName" required /></td>
          </tr>
          <tr>
            <th>Password:</th>
            <td><input name="pwd" type="password" required /></td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" id="sb" value="Login"/>
            </td>
          </tr>
        </table>
      </form>

      <table align="right">
        <tr>
          <td><a id="ca" href="create.php">Create Account</a></td>
        </tr>
      </table>
    </fieldset>

   
<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  session_start();

  $_SESSION["userName"] = $_POST["userName"];
  $_SESSION["pwd"] = $_POST["pwd"];

  header('Location: main.php');
  exit;
}

?>
 </body>
 </html>
