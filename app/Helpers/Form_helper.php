<?php 

function display_error($validate,$field)
{
    if($validate['email']->hasError($field))
    {
        return $validate['email']->getError($field);
    }
    else
    {
        return false;
    }
}

function sef_link($str){
    $preg = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '.' , '"');
    $match = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', '', '');
    $perma = strtolower(str_replace($preg, $match, $str));
    $perma = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $perma);
    $perma = trim(preg_replace('/\s+/', ' ', $perma));
    $perma = str_replace(' ', '-', $perma);
    return $perma;
}

function status($x){
    
    if($x == 1){

        echo '<span class="badge badge-success">'.lang('Text.Active').'</span>';

    }else{

        echo '<span class="badge badge-secondary">'.lang('Text.Passive').'</span>';

    }

}

?>