<?php namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{

    protected $table = 'language_settings';
    protected $primaryKey = 'id';
    protected $allowedField = ['username', 'email', 'password'];

    public function allCountry(){
        return $this->table($this->table_country)->findAll();
    }

    public function getUser($id = false)
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

    public function saveLanguage($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateLanguageSelect($data,$id)
    {
        $query = $this->db->table($this->table)->update($data,array('id' => $id));
        return $query;
    }

    public function updateLanguageSelectNoId($data)
    {
        $query = $this->db->table($this->table)->update($data);
        return $query;
    }

    public function deleteLanguage($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
    

}

?>