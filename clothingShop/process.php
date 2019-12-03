<?php

require_once('database_connection.php');

session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['UName']) || empty($_POST['Password']))
       {
            header("location:home.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from cust_info where Uname='".$_POST['UName']."' and Pass='".$_POST['Password']."'";
            $result=mysqli_query($con,$query);
 
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['UName'];
                echo "Hello, welcome back!";
                header("location:home.php");
            }
            else
            {
                header("location:home.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }
 
?>