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

function status($x)
{
    
    if($x == 1){

        echo '<span class="badge badge-success">'.lang('Text.Active').'</span>';

    }else{

        echo '<span class="badge badge-secondary">'.lang('Text.Passive').'</span>';

    }

}

function status_selected($x,$id,$short)
{
    
    if($x == 1){

        echo '- <span class="badge badge-warning">'.Lang('Text.DefaultLanguage').'</span>';

    }else{

        echo '- <span class="badge badge-dark selectBtn" data-id="'.$id.'" data-selected-id="'.$x.'" data-short-selected="'.$short.'" style="cursor:pointer;">'.Lang('Text.Select').'</span>';

    }

}

function isAllowedModules($moduleName = "")
{

    $group_id = session()->get('loggedUser')['group_id'];

    $db      = \Config\Database::connect();
    $builder = $db->table('user_groups');

    $builder->select('users.id,user_groups.id,user_groups.group_permission');
    $builder->join('users','users.group_id = user_groups.id');
    $builder->where('user_groups.id', $group_id);
    $query = $builder->get();
    $query_result = $query->getResult();

    foreach($query_result as $row){
        $p = $row->group_permission;
    }
 
    $permission = json_decode($p,true);

    if (isset($permission[$moduleName])) {
        return true;
    }else{
        return false;
    }

}

function dateFormat($date)
{
    return $newDate = date("d-m-Y H:i", strtotime($date));
}

?>