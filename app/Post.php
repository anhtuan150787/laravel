<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $table = 'post';
    protected $primaryKey  = 'post_id';

    public function paginate($pageItemOnPage) {
        return DB::table($this->table)->leftJoin('category', 'category.category_id', '=', 'post.category_id')->paginate($pageItemOnPage);
    }
}
