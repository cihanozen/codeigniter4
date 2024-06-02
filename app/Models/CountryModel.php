<?php namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{

    protected $table = 'countrys';
    protected $primaryKey = 'id';
    protected $allowedField = ['id', 'name', 'code', 'rewrite'];

    public function getCountry($id = false)
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

   
}

?>