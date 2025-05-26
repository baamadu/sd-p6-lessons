<?php

function isAdmin():bool
if(isset($_SESSION['user'])&&!empty($_SESSION[$_SESSION]))
{
    $user=$_SESSION['user']
    if($user->role == "admin")
    {
        return true;
    }
    else
    {
        return false;
    }

return false
}