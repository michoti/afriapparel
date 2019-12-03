<?php
    session_start();
 
    if(isset($_SESSION['User']))
    {
        echo ' Well Come ' . $_SESSION['User'].'<br/>';
        echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        echo 'you are logged out!'
        header("location:home.php");
    }
 
?>