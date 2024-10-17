<!DOCTYPE html>
<html>
  <body>
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    Username: <input type="text" name="username"><br>
    password: <input type="text" name="password"><br>
    <input type="submit">
  </form>
  </body>
</html>

<?php
include('user.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['username'], $_POST['password'])) {
      $person = new User($_POST['username'], $_POST['password']);
      $person->login();
      header("Refresh: 3; url=process.php");
   }
  }

