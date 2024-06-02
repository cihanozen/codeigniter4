<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedField = ['username', 'email', 'password'];

    public function getUser($id = false)
    {
        if($id === false)
        {   
            $this->select('*');
            $this->join('user_groups', 'user_groups.id = users.id');
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function saveUser($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateUser($data,$id)
    {
        $query = $this->db->table($this->table)->update($data,array('id' => $id));
        return $query;
    }

    public function deleteUser($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

}

?>