<?php  session_start();

function confirm_logged_in(){
    if (!isset($_SESSION['userName'])){
        redirect_to('login.php');
    }
    if (!isset($_SESSION['password'])){
        redirect_to('login.php');
    }
}

?>