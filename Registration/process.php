<?php
session_start();
if(isset($_SESSION['user_name'])){
    echo "You can access the page <br>";
    echo "<a href='/Registration/logout.php' style='text-decoration:none;'>
                      <button>Logout</button>
                  </a>";
}
else{
    echo "Login to access the page";
}