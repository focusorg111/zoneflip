<?php
use App\Category;
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




function get_navigation()
{
    return Category::with(['subcategories'])->get();
}


  function alert_messages()
{
    return Redirect::back()
       ->with('flash_message', 'internal server errors')
        ->with('flash_type', 'alert-danger');
 }

?>