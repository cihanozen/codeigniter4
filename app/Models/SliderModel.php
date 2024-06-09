<?php namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{

    protected $table = "sliders";
    protected $primaryKey = "id";
    protected $allowedFields = ['image_path', 'title', 'description'];
    protected $useTimestamps = true;


    public function deleteSlider($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

}

?>