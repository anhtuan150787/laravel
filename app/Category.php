<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey  = 'category_id';

    public function getAll($parent = 0, $level = -1, $data = array())
    {
        $result = DB::table($this->table)->select('*')->where(['category_parent' => $parent])->get();
        $level++;
        foreach ($result as $row) {
            $category_id = $row->category_id;
            $data[$category_id] = $row;
            $data[$category_id]->category_level = $level;
            $result = DB::table($this->table)->select('*')->where(['category_parent' => $category_id])->get();
            if ($result->count() > 0) {
                $data = $this->getAll($category_id, $level, $data);
            }
        }
        return $data;
    }
}
