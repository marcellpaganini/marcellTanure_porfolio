<?php
/*four steps to closing a session (logging out)
 * #1 - Find the session */
    include 'includes/session.php';
    include 'includes/functions.php';
// #2 - unset all the session variables
    $_SESSION = array();
// #3 - Destroy the session cookie
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-42000, '/');
    }
// #4 destroy the session
    session_destroy();
    redirect_to('login.php?logout=1')
?>