<?php namespace App\Models;

use CodeIgniter\Model;

class UsersGroupModel extends Model
{

    protected $table = 'user_groups';
    protected $primaryKey = 'id';
    protected $allowedField = ['id', 'group_name', 'group_permission', 'group_status'];

    public function getUserGroup($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function saveUserGroup($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateUserGroup($data,$id)
    {
        $query = $this->db->table($this->table)->update($data,array('id' => $id));
        return $query;
    }

    public function deleteUserGroup($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

}

?>