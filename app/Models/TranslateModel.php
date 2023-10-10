<?php namespace App\Models;

use CodeIgniter\Model;

class TranslateModel extends Model
{

    protected $table = 'language_translates';


    public function getTranslate($id)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where(['main' => $id]);
        $builder = $builder->get();
        return $builder->getResultArray()[0];
    }

    /*
    public function getTranslate($id = false)
    {
        if($id === false)
        {   
            return $this->findAll();
        }
        else
        {
            return $this->where(['main' => $id]);
        }
    }
    */

    public function saveTranslate($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateTranslate($data,$id)
    {
        $query = $this->db->table($this->table)->update($data,array('main' => $id));
        return $query;
    }

   
}

?>