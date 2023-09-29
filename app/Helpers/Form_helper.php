<?php 

function display_error($validate,$field)
{
    if($validate->hasError($field))
    {
        return $validate->getError($field);
    }
    else
    {
        return false;
    }
}

?>