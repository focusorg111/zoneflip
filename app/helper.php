<?php
// My common functions
function is_superAdmin()
{
    $user =\Auth::user();
    if($user->user_type==1)
    {
        return true;
    }
    else{
        return false;
    }
}

function is_seller()
{
    $user =\Auth::user();
    if($user->user_type==2)
    {
        return true;
    }
    else{
        return false;
    }
}
?>