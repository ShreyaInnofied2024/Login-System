<?php
session_start();
if(isset($_SESSION['user_name'])){
    echo "You can access the page";
}else{
    echo "Login to access the page";
}